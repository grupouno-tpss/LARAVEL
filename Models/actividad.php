<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\descripcion;
use App\Models\User;

class actividad extends Model
{
    use HasFactory;

    protected $table = "actividads";

    public function desc () {
        return $this->hasOne(descripcion::class);
    }
    public function users () {
        return $this->belongsToMany(User::class);
    }
}
