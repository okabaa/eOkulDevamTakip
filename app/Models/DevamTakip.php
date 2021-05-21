<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevamTakip extends Model
{
    use HasFactory;

    protected $fillable = ['sinif_id', 'name', 'date', 'hour', 'user_id'];
/*
    protected $appends = [
        'ogrenci',
        'devamli',
        'devamsiz',
        'devamliYuzde',
        'devamsizYuzde',
    ];

    public function getOgrenciAttribute()
    {
        return $this->ogrenciler()->count();
    }

    public function getDevamliAttribute()
    {
        $devam = 0;
        foreach ($this->ogrenciler()->get() as $item) {
            $devam += $item->devam;
        }
        return $devam;
    }

    public function getDevamsizAttribute()
    {
        return $this->ogrenci - $this->devamli;
    }

    public function getDevamliYuzdeAttribute()
    {
        return $this->ogrenci == 0 ? 0 : number_format($this->devamli / $this->ogrenci * 100, 0);
    }

    public function getDevamsizYuzdeAttribute()
    {
        return $this->ogrenci == 0 ? 0 : number_format($this->devamsiz / $this->ogrenci * 100, 0);
    }
*/
    public function sinif()
    {
        return $this->belongsTo(Sinif::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ogrenciler(){
        return $this->hasMany(DevamTakipOgrenci::class);
    }
}
