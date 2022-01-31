<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function contatos()
    {
        return $this->belongsToMany(Contato::class, 'contatos_grupos');
    }
}
