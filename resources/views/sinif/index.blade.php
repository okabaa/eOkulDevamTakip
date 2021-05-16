<x-app-layout>
    <x-slot name="header">Sınıflar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-md-right">
                @can('isAdmin',Auth::user())
                <a href="{{route('sinif.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Sınıf
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
                            <a href=" {{route('sinif.index')}} " class="btn btn-secondary">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>
            <hr>
            <div class="card-columns">
                @foreach($siniflar as $sinif)
                    <tr>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="card-title">{{$sinif->name}}</h5>
                                    <span>
                                        @can('isTeacher',Auth::user())
                                        <a href="{{route('ogrenci.index',['sinif' => $sinif->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-users"></i></a>
                                        @endcan
                                        @can('isAdmin',Auth::user())
                                        <a href="{{route('ogrenci.create',['sinif' => $sinif->id])}}" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i></a>
                                        <a href="{{route('sinif.edit',$sinif->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                        <a href="{{route('sinif.destroy',$sinif->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                        @endcan
                                    </span>
                                </div>
                                <p class="card-text">{{$sinif->description}}</p>
                                <p class="card-text"><small class="text-muted">Sınıfta kayıtlı {{$sinif->ogrenciler_count}} öğrenci
                                        bulunmaktadır.</small></p>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </div>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-left">
                @if($siniflar->total()!=0)
                    <p>Toplam {{$siniflar->total()}} kayıttan {{$siniflar->firstItem()}}
                        - {{$siniflar->lastItem()}} arasındaki kayıtlar gösteriliyor </p>
                @endif
            </div>
            <div class="float-right">
                {{$siniflar->withQueryString()->onEachSide(5)->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
