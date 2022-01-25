<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\anuncio_User;

class anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncios';

    public function Users() {
        return $this->belongsToMany(User::class);
    }
}
