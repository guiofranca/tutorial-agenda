<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sexo',
    ];

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
