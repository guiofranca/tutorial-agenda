<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'bairro',
        'cidade',
        'estado',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'descricao',
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}
