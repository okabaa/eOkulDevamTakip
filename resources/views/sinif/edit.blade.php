<x-app-layout>
    <x-slot name="header">Sınıf Güncelle</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('sinif.update',$sinif->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Sınıf Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ $sinif->name }}">
                </div>
                <div class="form-group">
                    <label>Sınıf Açıklama</label>
                    <textarea name="description" class="form-control" rows="4">{{ $sinif->description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Sınıf Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>

        </script>
    </x-slot>
</x-app-layout>
