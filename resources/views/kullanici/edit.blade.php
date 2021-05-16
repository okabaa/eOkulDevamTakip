<x-app-layout>
    <x-slot name="header">Kullanıcı Güncelleme</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('kullanici.update',$kullanici->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <a href=@if($kullanici->profile_photo_path) "{{asset('storage/'.$kullanici->profile_photo_path)}}" target="_blank" @else "#" @endif>
                    <img class="img-thumbnail rounded-circle w-32" width="%100"
                         src="@if($kullanici->profile_photo_path) {{asset('storage/'.$kullanici->profile_photo_path)}} @else https://ui-avatars.com/api/?name={{ $kullanici->name }};color=7F9CF5&amp;background=EBF4FF&amp;size=128 @endif"
                         alt="{{ $kullanici->name }}">
                    </a>
                    <input type="file" name="profile_photo_path" class="form-control">
                </div>
                <div class="form-group">
                    <label>Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ $kullanici->name }}">
                </div>
                <div class="form-group">
                    <label>Rolü </label>
                    <select name="role" class="form-control select2">
                        <option {{$kullanici->role=='teacher'?"selected=''":""}} value="teacher">Öğretmen</option>
                        <option {{$kullanici->role=='admin'?"selected=''":""}} value="admin">Yönetici</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>e-Posta </label>
                    <input type="email" name="email" class="form-control" value="{{ $kullanici->email }}">
                </div>
                <div class="form-group">
                    <label>Yeni Parola</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Sınıfı</label>
                    <select name="sinif_id" class="form-control select2">
                        <option value="">Sınıf Seçebilirsiniz.</option>
                        @foreach($siniflar as $sinif)
                            <option
                                {{$kullanici->sinif_id==$sinif->id?"selected=''":""}} value="{{$sinif->id}}">{{$sinif->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Kullanıcı Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>

        </script>
    </x-slot>
</x-app-layout>
