<x-app-layout>
    <x-slot name="header">Devam Takip Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('sinif.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Sınıf </label>
                    <select name="sinif_id" class="form-control select2">
                        <option value="teacher">Öğretmen</option>
                        <option value="admin">Yönetici</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dersin Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Ders Tarihi </label>
                    <input type="datetime-local" name="tarih" class="form-control" value="{{ old('ders_tarih') }}">
                </div>
                <div class="form-group">
                    <label>Ders Saati</label>
                    <select name="ders_saati" class="form-control select2">
                        <option value="1">1 Ders</option>
                        <option value="2">2 Ders</option>
                        <option value="3">3 Ders</option>
                        <option value="4">4 Ders</option>
                        <option value="5">5 Ders</option>
                        <option value="6">6 Ders</option>
                        <option value="7">7 Ders</option>
                        <option value="8">8 Ders</option>
                        <option value="9">9 Ders</option>
                        <option value="10">10 Ders</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>

        </script>
    </x-slot>
</x-app-layout>
