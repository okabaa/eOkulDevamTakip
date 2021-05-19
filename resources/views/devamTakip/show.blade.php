<x-app-layout>
    <x-slot name="header">
        {{str_replace("Sınıfı","", $devamTakip->sinif->name)." Sınıfının ".$devamTakip->name." Dersi Devam Takip Listesi"}}</x-slot>
    <div class="card">
        <div class="card-body pb-0">
            <h5 class="card-title float-md-right">
                @can('isTeacher',Auth::user())
                    <a href="{{route('devamtakip.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Devam Takip
                        Oluştur</a>
                @endcan
            </h5>
            <form method="GET" action="">
                <div class="form-row">
                    <div class="col-md-4">
                        <input type="text" name="ara" value="{{request()->get('ara')}}" placeholder="Arama..."
                               class="form-control">
                    </div>
                    @if(request()->get('ara'))
                        <div class="col-md-2">
                            <a href=" {{route('devamtakipliste.show',$devamTakip->id)}} " class="btn btn-secondary">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>
            <hr>
        </div>
        <div class="card-body pt-0">
            <div class="card-columns">
                <div class="col">
                    <div class="card p-2"><p class="card-text"><b>Sınıfın Adı:</b> {{$devamTakip->sinif->name}}</p></div>
                </div>
                <div class="col">
                    <div class="card p-2"><p class="card-text"><b>Dersin Adı:</b> {{$devamTakip->name}}</p></div>
                </div>
                <div class="col">
                    <div class="card p-2"><p class="card-text"><b>Ders
                                Tarihi:</b> {{date('d.m.Y', strtotime($devamTakip->date))}}</p></div>
                </div>
                <div class="col">
                    <div class="card p-2"><p class="card-text"><b>Ders Saati:</b> {{$devamTakip->hour}}. Ders</p></div>
                </div>
                <div class="col">
                    <div class="card p-2"><p class="card-text"><b>Ders Öğretmeni:</b> {{$devamTakip->user->name}}</p></div>
                </div>
            </div>
            <div class="card-columns">
                @foreach($devamTakipListe as $item)
                    <div class="col mb-1">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-xs-4 col-sm-4 pt-sm-3 pl-sm-3">
                                    <img class="img-thumbnail rounded-circle" width="%100"
                                         src="@if($item->ogrenci->profile_photo_path) {{asset($item->ogrenci->profile_photo_path)}} @else https://ui-avatars.com/api/?name={{ $item->ogrenci->name }};color=7F9CF5&amp;background=EBF4FF&amp;size=128 @endif"
                                         alt="{{ $item->ogrenci->name }}">
                                </div>
                                <div class="col-xs-8 col-sm-8">
                                    <div class="card-body">
                                        <div class="d-flex w-auto justify-content-between">
                                            <h5 class="card-title"></h5>
                                            <span>

                                                    <a class="btn btn-sm {{$item->devam?"btn-success":"btn-danger"}} disabled"><i
                                                            class="fa {{$item->devam?"fa-user-check":"fa-user-times"}} pr-1"></i> {{$item->devam?" VAR":" YOK"}}</a>
{{--                                                    <a href="{{route('devamtakipliste.edit',$item->ogrenci->id)}}"--}}
                                                {{--                                                       class="btn btn-sm {{$item->devam?"btn-success":"btn-danger"}} "><i class="fa {{$item->devam?"fa-user-check":"fa-user-times"}} pr-1"></i> {{$item->devam?" VAR":" YOK"}}</a>--}}
                                                {{--                                                @can('isAdmin',Auth::user())--}}
                                                {{--                                                    <a href="{{route('ogrenci.edit',$item->ogrenci->id)}}"--}}
                                                {{--                                                       class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>--}}
                                                {{--                                                    <a href="{{route('ogrenci.destroy',$item->ogrenci->id)}}"--}}
                                                {{--                                                       class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>--}}
                                                {{--                                                @endcan--}}
                                            </span>
                                        </div>
                                        <h4 class="card-title">{{$item->ogrenci->name}}</h4>
                                        <p class="card-text"><b>Velisi:</b> {{$item->ogrenci->parent_name}}</p>
                                        <p class="card-text"><small
                                                class="text-muted">{{$item->ogrenci->email}} </small></p>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-left">
                @if($devamTakipListe->total()!=0)
                    <p>Toplam {{$devamTakipListe->total()}} kayıttan {{$devamTakipListe->firstItem()}}
                        - {{$devamTakipListe->lastItem()}} arasındaki kayıtlar gösteriliyor </p>
                @endif
            </div>
            <div class="float-right">
                {{$devamTakipListe->withQueryString()->onEachSide(2)->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
