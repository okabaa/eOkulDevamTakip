<x-app-layout>
    <x-slot name="header">Sınıflar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-md-right">
                @can('isTeacher',Auth::user())
                    <a href="{{route('devamtakip.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Sınıf
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
                            <a href=" {{route('devamtakip.index')}} " class="btn btn-secondary">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>
            <hr>
            <div class="card-columns">
                @foreach($devamTakipler as $devamTakip)
                    <tr>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="card-title">{{$devamTakip->name}}</h5>
                                    <span>
                                        @can('isTeacher',Auth::user())
                                            <a href="{{route('devamtakip.show', $devamTakip->id)}}"
                                               class="btn btn-sm btn-warning"><i class="fa fa-users"></i></a>
                                            <a href="{{route('devamtakip.edit',$devamTakip->id)}}"
                                               class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                            <a href="{{route('devamtakip.destroy',$devamTakip->id)}}"
                                               class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                        @endcan
                                    </span>
                                </div>
                                <p class="card-text">{{str_replace("Sınıfı","", $devamTakip->sinif->name)." sınıfının"}}
                                    {{date('d.m.Y', strtotime($devamTakip->date))}}
                                    tarihindeki {{$devamTakip->hour}}. ders saati devam takibidir.</p>
                                <p class="card-text"><small class="text-muted">Sınıfta
                                        kayıtlı {{$devamTakip->ogrenciler_count}}
                                        öğrenciden {{$devamTakip->ogrenciler_sum_devam}} tanesi derse
                                        katılmıştır.</small></p>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </div>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-left">
                @if($devamTakipler->total()!=0)
                    <p>Toplam {{$devamTakipler->total()}} kayıttan {{$devamTakipler->firstItem()}}
                        - {{$devamTakipler->lastItem()}} arasındaki kayıtlar gösteriliyor </p>
                @endif
            </div>
            <div class="float-right">
                {{$devamTakipler->withQueryString()->onEachSide(2)->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
