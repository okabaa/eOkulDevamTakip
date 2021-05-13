<x-app-layout>
    <x-slot name="header">Öğrenci Kaydet</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('ogrenci.update',$ogrenci->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <a href=@if($ogrenci->profile_photo_path) "{{asset($ogrenci->profile_photo_path)}}" target="_blank" @else "#" @endif>
                        <img class="img-thumbnail rounded-circle w-32" width="%100"
                             src="@if($ogrenci->profile_photo_path) {{asset($ogrenci->profile_photo_path)}} @else https://ui-avatars.com/api/?name={{ $ogrenci->name }};color=7F9CF5&amp;background=EBF4FF&amp;size=128 @endif"
                             alt="{{ $ogrenci->name }}">
                    </a>
                    <input type="file" name="profile_photo_path" class="form-control">
                </div>
                <div class="form-group">
                    <label>Öğrenci Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ $ogrenci->name }}">
                </div>
                <div class="form-group">
                    <label>Veli Adı </label>
                    <input type="text" name="parent_name" class="form-control" value="{{ $ogrenci->parent_name }}">
                </div>
                <div class="form-group">
                    <label>e-Posta </label>
                    <input type="email" name="email" class="form-control" value="{{ $ogrenci->email }}">
                </div>
                <div class="form-group">
                    <label>Sınıfı</label>
                    <select name="sinif_id" class="form-control select2">
                        <option value="">Sınıf Seçebilirsiniz.</option>
                        @foreach($siniflar as $sinif)
                            <option
                                {{$ogrenci->sinif_id==$sinif->id?"selected=''":""}} value="{{$sinif->id}}">{{$sinif->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Öğrenci Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>

        </script>
    </x-slot>
</x-app-layout>
