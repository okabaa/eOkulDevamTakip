<?php

namespace Database\Factories;

use App\Models\DevamTakip;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevamTakipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DevamTakip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dersler = [
            'Almanca',
            'Anadolu İmam Hatip Lisesi Meslek Dersleri',
            'Astronomi Ve Uzay Bilimleri',
            'Beden Eğitimi Ve Spor',
            'Bilgi Kuramı',
            'Bilgisayar Bilimi',
            'Biyoloji',
            'Cağdaş Türk Ve Dünya Tarihi',
            'Coğrafya',
            'Diksiyon Ve Hitabet',
            'Din Kültürü Ve Ahlak Bilgisi (9-12)',
            'Ekonomi',
            'Felsefe',
            'Fen Lisesi Biyoloji',
            'Fen Lisesi Fizik',
            'Fen Lisesi Kimya',
            'Fen Lisesi Matematik',
            'Fizik',
            'Fransızca',
            'Girişimcilik',
            'Görsel Sanatlar',
            'Hazırlık Türk Dili Ve Edebiyatı',
            'İngilizce',
            'İngilizce (Hazırlık Sınıf Bulunan Kurumlar)',
            'İslam Bilim Tarihi',
            'İşletme',
            'Kimya',
            'Mantık',
            'Matematik',
            'Müzik',
            'Osmanlı Türkçesi',
            'Peygamberimizin Hayatı',
            'Proje Hazırlama',
            'Psikoloji',
            'Sağlık Bilgisi Ve Trafik Kültürü',
            'Sosyal Etkinlik',
            'Sosyoloji',
            'Tarih',
            'T.C.İnkılap Tarihi Ve Atatürkçülük',
            'Temel Dini Bilgiler (İslam 1-2)',
            'Türk Dili Ve Edebiyatı',
            'Türk Kültür Ve Medeniyet Tarihi',
            'Uluslararası İlişkiler',
            'Yönetim Bilimi',
            'Beden Eğitimi Ve Oyun',
            'Beden Eğitimi Ve Spor',
            'Bilim Uygulamaları (Seçmeli)',
            'Bilişim Teknolojileri Ve Yazılım',
            'Bilişim Teknolojileri Ve Yazılım (1-4. Sınıflar)',
            'Çince (Seçmeli)',
            'Din Kültürü Ve Ahlak Bilgisi (4-8)',
            'Drama (Seçmeli)',
            'Fen Bilimleri',
            'Görsel Sanatlar',
            'Görsel Sanatlar (Seçmeli)',
            'Halk Kültürü (Seçmeli)',
            'Hayat Bilgisi',
            'Hukuk Ve Adalet',
            'İletişim Ve Sunum Becerileri (Seçmeli)',
            'İngilizce (2-8)',
            'İnsan Hakları Yurttaşlık Ve Demokrasi',
            'Matematik',
            'Matematik Uygulamaları (Seçmeli)',
            'Medya Okuryazarlığı (Seçmeli)',
            'Müzik',
            'Okul Öncesi',
            'Okuma Becerileri (Seçmeli)',
            'Peygamberimizin Hayatı',
            'Satranç (İlkokul)',
            'Satranç (Okul Öncesi)',
            'Satranç (Ortaokul)',
            'Seçmeli Bilişim Teknolojileri Ve Yazılım (7 Ve 8. Sınıflar)',
            'Seçmeli Müzik [Bağlama (Saz) Modülü]',
            'Seçmeli Müzik (Genel Müzik Eğitimi Modülü)',
            'Seçmeli Müzik (Gitar Modülü)',
            'Seçmeli Müzik (Keman Modülü)',
            'Seçmeli Müzik (Piyano Modülü)',
            'Seçmeli Müzik (Thm Koro Müdülü)',
            'Seçmeli Müzik (Ut Modülü)',
            'Seçmeli Spor Ve Fiziki Etkinlikler',
            'Seçmeli Spor Ve Fiziki Etkinlikler (Atletizm Modülü)',
            'Seçmeli Spor Ve Fiziki Etkinlikler (Basketbol Modülü)',
            'Seçmeli Spor Ve Fiziki Etkinlikler (Bisiklet Modülü)',
            'Seçmeli Spor Ve Fiziki Etkinlikler (Okçuluk Modülü)',
            'Seçmeli Spor Ve Fiziki Etkinlikler (Tenis Modülü)',
            'Seçmeli Spor Ve Fiziki Etkinlikler (Yüzme Modülü)',
            'Sosyal Bilgiler',
            'Şehrimiz',
            'T.C.İnkılap Tarihi Ve Atatürkçülük',
            'Teknoloji Ve Tasarım',
            'Temel Dini Bilgiler',
            'Trafik Güvenliği',
            'Türkçe',
            'Yazarlık Ve Yazma Becerileri (Seçmeli)',
        ];
        return [
            'name' => $dersler[rand(0,93)],
            'date' => $this->faker->dateTimeThisMonth,
            'hour' => rand(1,10)
        ];
    }
}
