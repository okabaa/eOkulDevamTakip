<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevamTakip extends Model
{
    use HasFactory;

    protected $fillable = ['sinif_id', 'name', 'date', 'hour', 'user_id'];

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
