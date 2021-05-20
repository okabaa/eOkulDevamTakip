<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogrenci extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_name', 'email', 'profile_photo_path'];

    /*
    protected $appends = [
        'dersler',
        'devamli',
        'devamsiz',
        'devamliYuzde',
        'devamsizYuzde',
    ];

    public function getDerslerAttribute()
    {
        return $this->devamTakipListesi()->count();
    }

    public function getDevamliAttribute()
    {
        $devam = 0;
        foreach ($this->devamTakipListesi()->get() as $item) {
            $devam += $item->devam;
        }
        return $devam;
    }

    public function getDevamsizAttribute()
    {
        return $this->dersler - $this->devamli;
    }

    public function getDevamliYuzdeAttribute()
    {
        return $this->dersler == 0 ? 0 : number_format($this->devamli / $this->dersler * 100, 0);
    }

    public function getDevamsizYuzdeAttribute()
    {
        return $this->dersler == 0 ? 0 : number_format($this->devamsiz / $this->dersler * 100, 0);
    }
*/
    public function sinif()
    {
        return $this->belongsTo(Sinif::class);
    }

    public function devamTakipListesi()
    {
        return $this->hasMany(DevamTakipOgrenci::class);
    }

}
