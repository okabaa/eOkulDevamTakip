<?php

namespace App\Http\Controllers;

use App\Http\Requests\KullaniciCreateRequest;
use App\Http\Requests\KullaniciUpdateRequest;
use App\Models\Sinif;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KullaniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $siniflar = Sinif::all()->sortBy('name');
        if (request()->get('ara')) {
            $kullanicilar = User::where(function ($query) {
                $query->where('name', 'LIKE', "%" . request()->get('ara') . "%")
                    ->orWhereHas('sinif', function (Builder $query) {
                        $query->where('name', 'LIKE', "%" . request()->get('ara') . "%");
                    });
            });
            if (request()->get('sinif')) {
                $kullanicilar = $kullanicilar->where('sinif_id', '=', request()->get('sinif'));
            }
            $kullanicilar = $kullanicilar->where('id','<>',Auth::user()->id)->paginate(10);

        } elseif (request()->get('sinif')) {
            $kullanicilar = User::where('id','<>',Auth::user()->id)
                ->where('sinif_id', '=', request()->get('sinif'))
                ->paginate(10);
        } else {
            $kullanicilar = User::where('id','<>',Auth::user()->id)->paginate(10);
        }

        return view('kullanici.index', compact('kullanicilar', 'siniflar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siniflar = Sinif::all()->sortBy('name');
        return view('kullanici.create', compact('siniflar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KullaniciCreateRequest $request)
    {

        if ($request->hasFile('profile_photo_path')) {
            $fileName = Str::slug($request->name) . '-' . uniqid() . '.' . $request->profile_photo_path->extension();
            $fileNameWithUpload = 'profile-photos/' . $fileName;
            $request->profile_photo_path->move(public_path('profile-photos'), $fileName);
            $request->merge([
                'profile_photo_path' => $fileNameWithUpload
            ]);
        }
        $request->merge([
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

//        return $request;

        User::create($request->post());
        return redirect()->route('kullanici.index')->withSuccess('Kullanıcı Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siniflar = Sinif::all()->sortBy('name');
        $kullanici = User::find($id) ?? abort(404, 'Kullanıcı Bulunamadı');
        return view('kullanici.edit', compact('kullanici', 'siniflar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KullaniciUpdateRequest $request, $id)
    {
        $kullanici = User::find($id) ?? abort(404, 'Kullanıcı Bulunamadı');
        if ($request->hasFile('profile_photo_path')) {
            $fileName = Str::slug($request->name . '-' . $request->parent_name) . '-' . uniqid() . '.' . $request->profile_photo_path->extension();
            $fileNameWithUpload = 'profile-photos/' . $fileName;
            $request->profile_photo_path->move(public_path('profile-photos'), $fileName);
            $request->merge([
                'profile_photo_path' => $fileNameWithUpload
            ]);
        }

        if ($request->password){
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        }

        User::whereId($id)->first()->update(($request->password)?$request->post():$request->except(['password']));
        return redirect()->route('kullanici.index')->withSuccess('Kullanıcı güncelleme işlemi başarıyla gerçekleşti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kullanici = User::find($id) ?? abort(404, 'Kullanıcı Bulunamadı');
        $kullanici->delete();
        return redirect()->route('kullanici.index')->withSuccess('Kullanıcı silme işlemi başarıyla gerçekleşti');
    }
}
