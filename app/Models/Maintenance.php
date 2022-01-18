<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'tajukPenyelenggaraan',
        'aplikasiPenyelenggaraan',
        'mulaPenyelenggaraan',
        'tamatPenyelenggaraan',
        'tersedia',
        'kataAluan',
        'kataAkhiran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
