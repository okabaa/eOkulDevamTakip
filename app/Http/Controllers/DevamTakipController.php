<?php

namespace App\Http\Controllers;

use App\Models\DevamTakip;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DevamTakipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devamTakipler = DevamTakip::withCount('ogrenciler')->withSum('ogrenciler', 'devam');

        if (request()->get('ara')) {
            $devamTakipler = $devamTakipler
                ->where(function ($query) {
                    $query->where('name', 'LIKE', "%" . request()->get('ara') . "%")
                        ->orWhereHas('sinif', function (Builder $query) {
                            $query->where('name', 'LIKE', "%" . request()->get('ara') . "%");
                        });
                });
        }

        $devamTakipler = $devamTakipler->paginate(9);

        return view('devamtakip.index', compact('devamTakipler'));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\DevamTakip $devamTakip
     * @return \Illuminate\Http\Response
     */
    public function show(DevamTakip $devamTakip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DevamTakip $devamTakip
     * @return \Illuminate\Http\Response
     */
    public function edit(DevamTakip $devamTakip)
    {
        //
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
    public function destroy(DevamTakip $devamTakip)
    {
        //
    }
}
