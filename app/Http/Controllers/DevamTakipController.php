<?php

namespace App\Http\Controllers;

use App\Http\Requests\DevamTakipCreateRequest;
use App\Models\DevamTakip;
use App\Models\DevamTakipOgrenci;
use App\Models\Ogrenci;
use App\Models\Sinif;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevamTakipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siniflar = Sinif::all()->sortBy('name');
        $devamTakipler = DevamTakip::withCount('ogrenciler')->withSum('ogrenciler', 'devam');

        if (Auth::user()->role != 'admin') {
            $devamTakipler->where('user_id', Auth::user()->id);
        }

        if (request()->get('ara')) {
            $devamTakipler = $devamTakipler
                ->where(function ($query) {
                    $query->where('name', 'LIKE', "%" . request()->get('ara') . "%")
                        ->orWhereHas('sinif', function (Builder $query) {
                            $query->where('name', 'LIKE', "%" . request()->get('ara') . "%");
                        })
                        ->orWhereHas('user', function (Builder $query) {
                            $query->where('name', 'LIKE', "%" . request()->get('ara') . "%");
                        })
                        ->orWhereHas('ogrenciler', function (Builder $query) {
                            $query->whereHas('ogrenci', function (Builder $query) {
                                $query->where('name', 'LIKE', "%" . request()->get('ara') . "%");
                            });
                        });
                });
            if (request()->get('sinif')) {
                $devamTakipler = $devamTakipler->where('sinif_id', '=', request()->get('sinif'));
            }
        } elseif (request()->get('sinif')) {
            $devamTakipler = $devamTakipler->where('sinif_id', '=', request()->get('sinif'));
        }


        $devamTakipler = $devamTakipler->paginate(9);

        return view('devamtakip.index', compact('devamTakipler', 'siniflar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siniflar = Sinif::all()->sortBy('name');
        return view('devamtakip.create', compact('siniflar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevamTakipCreateRequest $request)
    {
        $request->merge([
            'user_id' => Auth::user()->id,
        ]);
        $devamTakip = DevamTakip::create($request->post());
        $ogrenciler = Ogrenci::where('sinif_id', $devamTakip->sinif_id)->get();
        foreach ($ogrenciler as $ogrenci) {
            DevamTakipOgrenci::create([
                'devam_takip_id' => $devamTakip->id,
                'ogrenci_id' => $ogrenci->id,
                'devam' => 1
            ]);
        }
        return redirect()->route('devamtakipliste.edit', $devamTakip->id)->withSuccess('Devam Takip Kaydı Başarıyla Oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\DevamTakip $devamTakip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DevamTakip $devamTakip
     * @return \Illuminate\Http\Response
     */
    public function edit($devamTakipOgenciId)
    {
        $devamTakipOgenci = DevamTakipOgrenci::find($devamTakipOgenciId) ?? abort(404, 'Devam Takip Listesinde Öğrenci Bulunamadı');

        DevamTakipOgrenci::where('id', $devamTakipOgenciId)->update([
            'devam' => $devamTakipOgenci->devam == 1 ? 0 : 1
        ]);
        return redirect()->route('devamtakipliste.edit', $devamTakipOgenci->devam_takip_id)->withSuccess($devamTakipOgenci->ogrenci->name . ' isimli öğrencinin devam durumu güncelleme işlemi başarıyla gerçekleşti');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevamTakip $devamTakip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DevamTakip $devamTakip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DevamTakip $devamTakip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $devamTakip = DevamTakip::find($id) ?? abort(404, 'Devam kakip kaydı Bulunamadı');
        $devamTakip->delete();
        return redirect()->route('devamtakip.index')->withSuccess('Devam takip kaydı silme işlemi başarıyla gerçekleşti');
    }
}
