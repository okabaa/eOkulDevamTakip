<?php

namespace App\Http\Controllers;

use App\Models\DevamTakip;
use App\Models\DevamTakipOgrenci;
use App\Models\Ogrenci;
use App\Models\Sinif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index()
    {
        $dersler = DevamTakipOgrenci::select('devam_takip_id')
            ->selectRaw('count(*) as ogrenci')
            ->selectRaw('sum(devam) as devamli')
            ->selectRaw('count(*) - sum(devam) as devamsiz')
            ->selectRaw('round((count(*) - sum(devam))/count(*)*100,0) as devamsizYuzde')
            ->groupBy('devam_takip_id');

        $siniflar = DevamTakip::joinSub($dersler, 'dersler', function ($join) {
            $join->on('devam_takips.id', '=', 'dersler.devam_takip_id');
        })->select('sinif_id')
            ->selectRaw('sum(dersler.ogrenci) as ogrenci')
            ->selectRaw('sum(dersler.devamli) as devamli')
            ->selectRaw('sum(dersler.devamsiz) as devamsiz')
            ->selectRaw('round(sum(dersler.devamsiz)/sum(dersler.ogrenci)*100,0) as devamsizYuzde')
            ->groupBy('sinif_id');

        $ogrenciler = DevamTakipOgrenci::select('ogrenci_id')
            ->selectRaw('count(*) as ders')
            ->selectRaw('sum(devam) as devamli')
            ->selectRaw('count(*) - sum(devam) as devamsiz')
            ->selectRaw('round((count(*) - sum(devam))/count(*)*100,0) as devamsizYuzde')
            ->groupBy('ogrenci_id');

//          return $ogrenciler->orderBy('devamsiz', 'desc')->get();
//        dd($topBesSinif);
//        return $siniflar;

        /*
        $dersler = Cache::remember('dersler', 120, function () {
             return DevamTakip::all()->sortBy([
                 ['devamsizYuzde', 'desc'],
                 ['devamliYuzde', 'desc']
             ]);
         });

         $siniflar = Cache::remember('siniflar', 120, function () {
             return Sinif::all()->sortBy([
                 ['devamsizYuzde', 'desc'],
                 ['devamliYuzde', 'desc']
             ]);
         });
         $ogrenciler = Cache::remember('ogrenciler', 120, function () {
             return Ogrenci::all()->sortBy([
                 ['devamsiz', 'desc'],
                 ['devamli', 'desc']
             ]);
         });
         $topBesOgrenci = $ogrenciler->take(5);
         $topBesDers = $dersler->take(5);
         $topBesSinif = $siniflar->take(5);
        return view('dashboard', compact('topBesOgrenci', 'topBesDers', 'topBesSinif'));
        */
        $topBesDers = $dersler->orderBy('devamsizYuzde', 'desc')->take(5)->get();
        $topBesSinif = $siniflar->orderBy('devamsizYuzde', 'desc')->take(5)->get();
        $topBesOgrenci = $ogrenciler->orderBy('devamsiz', 'desc')->take(5)->get();
        return view('dashboard', compact('topBesDers','topBesSinif','topBesOgrenci'));
    }
    public function welcome(){
        $data['ogrenci'] = Ogrenci::count();
        $data['ogretmen'] = User::whereRole('teacher')->count();
        $data['yonetici'] = User::whereRole('admin')->count();
        $data['sinif'] = Sinif::count();
        $data['dersler'] = DevamTakip::count();
        $data['ders'] = DevamTakip::select('name')->selectRaw('count(*) as ders')->groupBy('name')->count();

        return view('welcome',compact('data'));
    }
}
