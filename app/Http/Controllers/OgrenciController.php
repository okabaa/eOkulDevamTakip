<?php

namespace App\Http\Controllers;

use App\Http\Requests\OgrenciCreateRequest;
use App\Http\Requests\OgrenciUpdateRequest;
use App\Models\Ogrenci;
use App\Models\Sinif;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OgrenciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->get('ara')) {
            $ogrenciler = Ogrenci::where('name', 'LIKE', "%" . request()->get('ara') . "%")
                ->orWhere('parent_name', 'LIKE', "%" . request()->get('ara') . "%")
                ->paginate(10);
        } else {

            $ogrenciler = Ogrenci::paginate(10);
        }
        return view('ogrenci.index', compact('ogrenciler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siniflar = Sinif::all()->sortBy('name');
        return view('ogrenci.create', compact('siniflar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OgrenciCreateRequest $request)
    {
        if ($request->hasFile('profile_photo_path')) {
            $fileName = Str::slug($request->name . '-' . $request->parent_name) . '-' . uniqid() . '.' . $request->profile_photo_path->extension();
            $fileNameWithUpload = 'ogrenciler/' . $fileName;
            $request->profile_photo_path->move(public_path('ogrenciler'), $fileName);
            $request->merge([
                'profile_photo_path' => $fileNameWithUpload
            ]);
        }
        Ogrenci::create($request->post());
        return redirect()->route('ogrenci.index')->withSuccess('Öğrenci Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ogrenci $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function show(Ogrenci $ogrenci)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ogrenci $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siniflar = Sinif::all()->sortBy('name');
        $ogrenci = Ogrenci::find($id) ?? abort(404, 'Öğrenci Bulunamadı');
        return view('ogrenci.edit', compact('ogrenci', 'siniflar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ogrenci $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function update(OgrenciUpdateRequest $request, $id)
    {
        $ogrenci = Ogrenci::find($id) ?? abort(404, 'Öğrenci Bulunamadı');
        if ($request->hasFile('profile_photo_path')) {
            $fileName = Str::slug($request->name . '-' . $request->parent_name) . '-' . uniqid() . '.' . $request->profile_photo_path->extension();
            $fileNameWithUpload = 'ogrenciler/' . $fileName;
            $request->profile_photo_path->move(public_path('ogrenciler'), $fileName);
            $request->merge([
                'profile_photo_path' => $fileNameWithUpload
            ]);
        }

        Ogrenci::whereId($id)->first()->update($request->post());
        return redirect()->route('ogrenci.index')->withSuccess('Öğrenci güncelleme işlemi başarıyla gerçekleşti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ogrenci $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ogrenci = Ogrenci::find($id) ?? abort(404, 'Öğrenci Bulunamadı');
        $ogrenci->delete();
        return redirect()->route('ogrenci.index')->withSuccess('Öğrenci silme işlemi başarıyla gerçekleşti');
    }
}
