<x-app-layout>
    <x-slot name="header">Öğrenciler</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('ogrenci.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Öğrenci
                    Kaydet</a>
            </h5>
            <div class="row row-cols-1 row-cols-md-2">
                @foreach($ogrenciler as $ogrenci)
                    <div class="col mb-4">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-xs-4 col-sm-4 pt-sm-3 pl-sm-3">
                                    <img class="img-thumbnail rounded-circle" width="%100"
                                         src="@if($ogrenci->profile_photo_path) {{asset($ogrenci->profile_photo_path)}} @else https://ui-avatars.com/api/?name={{ $ogrenci->name }};color=7F9CF5&amp;background=EBF4FF&amp;size=128 @endif"
                                         alt="{{ $ogrenci->name }}">
                                </div>
                                <div class="col-xs-8 col-sm-8">
                                    <div class="card-body">
                                        <div class="d-flex w-auto justify-content-between">
                                            <h5 class="card-title"></h5>
                                            <span>
                                                 <a href="{{route('sinif.edit',$ogrenci->id)}}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                                 <a href="{{route('sinif.destroy',$ogrenci->id)}}"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                            </span>
                                        </div>
                                        <h4 class="card-title">{{$ogrenci->name}}</h4>
                                        <p class="card-text"><b>Velisiu:</b> {{$ogrenci->parent_name}}</p>
                                        <p class="card-text"><small class="text-muted">{{$ogrenci->email}} </small></p>
                                        <p class="card-text"><small class="text-muted">Sınıf : </small></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </table>
            {{$ogrenciler->links()}}
        </div>
    </div>
</x-app-layout>
