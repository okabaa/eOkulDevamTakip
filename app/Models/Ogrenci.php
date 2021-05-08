<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogrenci extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_name', 'email','profile_photo_path'];

    public function sinif()
    {
        $this->belongsTo(Sinif::class);
    }
}
