<?php

namespace App\Http\Controllers;

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
        $siniflar = Sinif::paginate(6);
        return view('sinif.index',compact('siniflar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create sayfafası';
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
     * @param  \App\Models\Sinif  $sinif
     * @return \Illuminate\Http\Response
     */
    public function show(Sinif $sinif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sinif  $sinif
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinif $sinif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sinif  $sinif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinif $sinif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sinif  $sinif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinif $sinif)
    {
        //
    }
}
