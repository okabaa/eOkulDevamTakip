<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinif extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function ogrenciler()
    {
        return $this->hasMany(Ogrenci::class);
    }
}
