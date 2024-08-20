<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'pekerjaan',
        'no_ktp',
        'no_telepon',
        'ibu_kandung',
        'kota_kabupaten',
        'date_birthday',
    ];
}