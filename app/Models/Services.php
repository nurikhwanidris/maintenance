<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance;

class Services extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function notice()
    {
        return $this->hasMany(Maintenance::class);
    }
}
