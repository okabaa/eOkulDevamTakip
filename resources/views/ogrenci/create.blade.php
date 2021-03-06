<x-app-layout>
    <x-slot name="header">{{request()->get('sinif')?str_replace("Sınıfı","", $siniflar->where('id',request()->get('sinif'))->first()->name)." Sınıfına":""}} Öğrenci Kaydet</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{request()->get('sinif')?route('ogrenci.store',['sinif' => request()->get('sinif')]):route('ogrenci.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="profile_photo_path" class="form-control">
                </div>
                <div class="form-group">
                    <label>Öğrenci Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Veli Adı </label>
                    <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name') }}">
                </div>
                <div class="form-group">
                    <label>e-Posta </label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Sınıfı</label>
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
