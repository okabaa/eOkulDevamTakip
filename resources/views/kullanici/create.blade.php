<x-app-layout>
    <x-slot name="header">Kullanici Kaydet</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('kullanici.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="profile_photo_path" class="form-control">
                </div>
                <div class="form-group">
                    <label>Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Rolü </label>
                    <select name="role" class="form-control select2">
                        <option value="teacher">Öğretmen</option>
                        <option value="admin">Yönetici</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>e-Posta </label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Parola</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Sorumlu Sınıfı</label>
                    <select name="sinif_id" class="form-control select2" {{request()->get('sinif')?"disabled":""}}>
                        <option value="">Sınıf Seçebilirsiniz.</option>
                        @foreach($siniflar as $sinif)
                            <option {{request()->get('sinif')==$sinif->id?"selected=''":""}} value="{{$sinif->id}}">{{$sinif->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Öğrenci Kaydet</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>

        </script>
    </x-slot>
</x-app-layout>
