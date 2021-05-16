<x-app-layout>
    <x-slot name="header">Kullanicilar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-md-right">
                <a href="{{route('kullanici.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Kullanici
                    Kaydet</a>
            </h5>
            <form method="GET" action="">
                <div class="form-row">
                    <div class="col-md-4">
                        <input type="text" name="ara" value="{{request()->get('ara')}}" placeholder="Arama..."
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <select name="sinif" class="form-control select2" onchange="this.form.submit()" >
                            <option value="">Sınıf Seçebilirsiniz.</option>
                            @foreach($siniflar as $sinif)
                                <option {{request()->get('sinif')==$sinif->id?"selected=''":""}}
                                        value="{{$sinif->id}}">{{$sinif->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(request()->get('ara') || request()->get('sinif'))
                        <div class="col-md-2">
                            <a href=" {{route('kullanici.index')}} " class="btn btn-secondary">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>
            <hr>
            <div class="row row-cols-1 row-cols-md-2">
                @foreach($kullanicilar as $kullanici)
                    <div class="col mb-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-xs-4 col-sm-4 pt-sm-3 pl-sm-3">
                                    <img class="img-thumbnail rounded-circle" width="%100"
                                         src="@if($kullanici->profile_photo_path) {{asset('storage/'.$kullanici->profile_photo_path)}} @else https://ui-avatars.com/api/?name={{ $kullanici->name }};color=7F9CF5&amp;background=EBF4FF&amp;size=128 @endif"
                                         alt="{{ $kullanici->name }}">
                                </div>
                                <div class="col-xs-8 col-sm-8">
                                    <div class="card-body">
                                        <div class="d-flex w-auto justify-content-between">
                                            <h5 class="card-title"></h5>
                                            <span>
                                                @can('isAdmin',Auth::user())
                                                 <a href="{{route('kullanici.edit',$kullanici->id)}}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                 <a href="{{route('kullanici.destroy',$kullanici->id)}}"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                @endcan
                                            </span>
                                        </div>
                                        <h4 class="card-title">{{$kullanici->name}}</h4>
                                        <p class="card-text"><b>Rolü:</b> {{$kullanici->role=='admin'?"Yönetici":'Öğretmen'}}</p>
                                        <p class="card-text"><small class="text-muted">{{$kullanici->email}} </small></p>
                                        <p class="card-text"><small class="text-muted">Sorumlu Sınıfı
                                                : @isset($kullanici->sinif->name) {{$kullanici->sinif->name}} @endif</small>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer">
            <div class="float-left">
                @if($kullanicilar->total()!=0)
                    <p>Toplam {{$kullanicilar->total()}} kayıttan {{$kullanicilar->firstItem()}}
                        - {{$kullanicilar->lastItem()}} arasındaki kayıtlar gösteriliyor </p>
                @endif
            </div>
            <div class="float-right">
                {{$kullanicilar->withQueryString()->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
