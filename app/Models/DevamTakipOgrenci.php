<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevamTakipOgrenci extends Model
{
    use HasFactory;

    protected $fillable = ['devam_takip_id', 'ogrenci_id', 'devam'];
}
