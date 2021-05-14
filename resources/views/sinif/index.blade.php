<x-app-layout>
    <x-slot name="header">Sınıflar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{route('sinif.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Sınıf
                    Oluştur</a>
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
                                        <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-users"></i></a>
                                        <a href="#" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i></a>
                                        <a href="{{route('sinif.edit',$sinif->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                        <a href="{{route('sinif.destroy',$sinif->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
            {{$siniflar->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>
