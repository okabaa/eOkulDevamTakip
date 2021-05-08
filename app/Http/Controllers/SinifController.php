<?php

namespace App\Http\Controllers;

use App\Http\Requests\SinifCreateRequest;
use App\Http\Requests\SinifUpdateRequest;
use App\Models\Sinif;
use Illuminate\Http\Request;

class SinifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siniflar = Sinif::withCount('ogrenciler')->paginate(6);
        return view('sinif.index', compact('siniflar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SinifCreateRequest $request)
    {
        Sinif::create($request->post());
        return redirect()->route('sinif.index')->withSuccess('Sınıf Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sinif $sinif
     * @return \Illuminate\Http\Response
     */
    public function show(Sinif $sinif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sinif $sinif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sinif = Sinif::find($id) ?? abort(404, 'Sınıf Bulunamadı');
        return view('sinif.edit',compact('sinif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sinif $sinif
     * @return \Illuminate\Http\Response
     */
    public function update(SinifUpdateRequest $request, $id)
    {
        $sinif = Sinif::find($id) ?? abort(404, 'Sınıf Bulunamadı');

        Sinif::where('id',$id)->update($request->except(['_method','_token']));

        return redirect()->route('sinif.index')->withSuccess('Sınıf güncelleme işlemi başarıyla gerçekleşti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sinif $sinif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinif = Sinif::find($id) ?? abort(404,'Sınıf Bulunamadı');
        $sinif->delete();
        return redirect()->route('sinif.index')->withSuccess('Sınıf silme işlemi başarıyla gerçekleşti');
    }
}
