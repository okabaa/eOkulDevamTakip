<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    En Çok Devamsızlık Yapan 5 Öğrenci
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($topBesOgrenci as $item)
                        <a href="{{route('devamtakip.index',['sinif' => $item->ogrenci->sinif_id,'ara' => $item->ogrenci->name])}}">
                            <li class="list-group-item">{{$item->ogrenci->name}} ({{$item->devamsiz}} Ders, %{{$item->devamsizYuzde}})</li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Devamsızlık Oranı En Yüksek 5 Sınıf
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($topBesSinif as $item)
                        <li class="list-group-item">
                            <a href="{{route('devamtakip.index',['sinif' => $item->sinif_id])}}">
                                {{$item->sinif->name}} (% {{$item->devamsizYuzde}})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Devamsızlık Oranı En Yüksek 5 Ders
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($topBesDers as $item)
                        <li class="list-group-item">
                            @can('isAuthUser',$item->devamTakip)
                                <a href="{{route('devamtakipliste.edit', $item->devam_takip_id)}}">
                            @elsecan('isAdmin',$item->devamTakip)
                                <a href="{{route('devamtakipliste.show', $item->devam_takip_id)}}">
                            @endcan
                                {{$item->devamTakip->name}} (% {{$item->devamsizYuzde}})
                            @canany(['isAdmin','isAuthUser'],$item->devamTakip) </a> @endcan
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
