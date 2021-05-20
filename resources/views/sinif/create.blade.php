<x-app-layout>
    <x-slot name="header">Sınıf Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('sinif.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Sınıf Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Sınıf Açıklama</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Sınıf Oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>

        </script>
    </x-slot>
</x-app-layout>
