<?php

namespace App\Http\Controllers;

use App\Models\DevamTakip;
use App\Models\DevamTakipOgrenci;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DevamTakipOgrenciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DevamTakipOgrenci  $devamTakipOgrenci
     * @return \Illuminate\Http\Response
     */
    public function show($devamTakipId)
    {
        $devamTakip = DevamTakip::whereId($devamTakipId)->withCount('ogrenciler')->withSum('ogrenciler', 'devam')->first();
        $devamTakipListe = DevamTakipOgrenci::where('devam_takip_id',$devamTakipId)->with('ogrenci');

        if (request()->get('ara')) {
            $devamTakipListe = $devamTakipListe
                ->where(function ($query) {
                    $query->whereHas('ogrenci', function (Builder $query) {
                        $query->where('name', 'LIKE', "%" . request()->get('ara') . "%")
                            ->orWhere('parent_name', 'LIKE', "%" . request()->get('ara') . "%");
                    });
                });
        }
        $devamTakipListe = $devamTakipListe->paginate(9);
//        return $devamTakip;
        return view('devamtakip.show', compact('devamTakipListe','devamTakip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DevamTakipOgrenci  $devamTakipOgrenci
     * @return \Illuminate\Http\Response
     */
    public function edit($devamTakipId)
    {
        $devamTakip = DevamTakip::whereId($devamTakipId)->withCount('ogrenciler')->withSum('ogrenciler', 'devam')->first();
        $devamTakipListe = DevamTakipOgrenci::where('devam_takip_id',$devamTakipId)->with('ogrenci');

        if (request()->get('ara')) {
            $devamTakipListe = $devamTakipListe
                ->where(function ($query) {
                    $query->whereHas('ogrenci', function (Builder $query) {
                        $query->where('name', 'LIKE', "%" . request()->get('ara') . "%")
                            ->orWhere('parent_name', 'LIKE', "%" . request()->get('ara') . "%");
                    });
                });
        }
        $devamTakipListe = $devamTakipListe->paginate(9);
//        return $devamTakip;
        return view('devamtakip.edit', compact('devamTakipListe','devamTakip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DevamTakipOgrenci  $devamTakipOgrenci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DevamTakipOgrenci $devamTakipOgrenci)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DevamTakipOgrenci  $devamTakipOgrenci
     * @return \Illuminate\Http\Response
     */
    public function destroy(DevamTakipOgrenci $devamTakipOgrenci)
    {
        //
    }
}
