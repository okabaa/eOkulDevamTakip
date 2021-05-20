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
            'Astronomi ve Uzay Bilimleri',
            'Beden Eğitimi ve Spor',
            'Bilgi Kuramı',
            'Bilgisayar Bilimi',
            'Biyoloji',
            'Cağdaş Türk ve Dünya Tarihi',
            'Coğrafya',
            'Diksiyon ve Hitabet',
            'Din Kültürü ve Ahlak Bilgisi (9-12)',
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
            'Hazırlık Türk Dili ve Edebiyatı',
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
            'Sağlık Bilgisi ve Trafik Kültürü',
            'Sosyal Etkinlik',
            'Sosyoloji',
            'Tarih',
            'T.C.İnkılap Tarihi ve Atatürkçülük',
            'Temel Dini Bilgiler (İslam 1-2)',
            'Türk Dili ve Edebiyatı',
            'Türk Kültür ve Medeniyet Tarihi',
            'Uluslararası İlişkiler',
            'Yönetim Bilimi',
            'Beden Eğitimi ve Oyun',
            'Beden Eğitimi ve Spor',
            'Bilim Uygulamaları (Seçmeli)',
            'Bilişim Teknolojileri ve Yazılım',
            'Bilişim Teknolojileri ve Yazılım (1-4. Sınıflar)',
            'Çince (Seçmeli)',
            'Din Kültürü ve Ahlak Bilgisi (4-8)',
            'Drama (Seçmeli)',
            'Fen Bilimleri',
            'Görsel Sanatlar',
            'Görsel Sanatlar (Seçmeli)',
            'Halk Kültürü (Seçmeli)',
            'Hayat Bilgisi',
            'Hukuk ve Adalet',
            'İletişim ve Sunum Becerileri (Seçmeli)',
            'İngilizce (2-8)',
            'İnsan Hakları Yurttaşlık ve Demokrasi',
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
            'Seçmeli Bilişim Teknolojileri ve Yazılım (7 ve 8. Sınıflar)',
            'Seçmeli Müzik [Bağlama (Saz) Modülü]',
            'Seçmeli Müzik (Genel Müzik Eğitimi Modülü)',
            'Seçmeli Müzik (Gitar Modülü)',
            'Seçmeli Müzik (Keman Modülü)',
            'Seçmeli Müzik (Piyano Modülü)',
            'Seçmeli Müzik (Thm Koro Müdülü)',
            'Seçmeli Müzik (Ut Modülü)',
            'Seçmeli Spor ve Fiziki Etkinlikler',
            'Seçmeli Spor ve Fiziki Etkinlikler (Atletizm Modülü)',
            'Seçmeli Spor ve Fiziki Etkinlikler (Basketbol Modülü)',
            'Seçmeli Spor ve Fiziki Etkinlikler (Bisiklet Modülü)',
            'Seçmeli Spor ve Fiziki Etkinlikler (Okçuluk Modülü)',
            'Seçmeli Spor ve Fiziki Etkinlikler (Tenis Modülü)',
            'Seçmeli Spor ve Fiziki Etkinlikler (Yüzme Modülü)',
            'Sosyal Bilgiler',
            'Şehrimiz',
            'T.C.İnkılap Tarihi ve Atatürkçülük',
            'Teknoloji ve Tasarım',
            'Temel Dini Bilgiler',
            'Trafik Güvenliği',
            'Türkçe',
            'Yazarlık ve Yazma Becerileri (Seçmeli)',
        ];
        return [
            'name' => $dersler[rand(0,93)],
            'date' => $this->faker->dateTimeThisMonth,
            'hour' => rand(1,10)
        ];
    }
}
