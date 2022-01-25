<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\actividad;

class descripcion extends Model
{
    use HasFactory;

    protected $table = "descripcions";

    public function actividad(){
        return $this->belongsTo(actividad::class);
    }
}
