<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinif extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected $appends = [
        'dersler',
        'devamli',
        'devamsiz',
        'devamliYuzde',
        'devamsizYuzde',
    ];

    public function getDerslerAttribute()
    {
        $devam = 0;
        foreach ($this->devamTakipler()->get() as $item) {
            $devam += $item->ogrenci;
        }
        return $devam;
    }

    public function getDevamliAttribute()
    {
        $devam = 0;
        foreach ($this->devamTakipler()->get() as $item) {
            $devam += $item->devamli;
        }
        return $devam;
    }

    public function getDevamsizAttribute()
    {
        $devam = 0;
        foreach ($this->devamTakipler()->get() as $item) {
            $devam += $item->devamsiz;
        }
        return $devam;
    }
    public function getDevamliYuzdeAttribute()
    {
        return $this->dersler == 0 ? 0 : number_format($this->devamli / $this->dersler * 100, 0);
    }

    public function getDevamsizYuzdeAttribute()
    {
        return $this->dersler == 0 ? 0 : number_format($this->devamsiz / $this->dersler * 100, 0);
    }

    public function ogrenciler()
    {
        return $this->hasMany(Ogrenci::class);
    }

    public function kullanici()
    {
        return $this->hasOne(User::class);
    }

    public function devamTakipler(){
    return $this->hasMany(DevamTakip::class);
    }
}
