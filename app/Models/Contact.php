<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'sobrenome',
        'rua',
        'cidade',
        'uf',
        'cep',
        'cpf',
        'telefone',
        'user_id',
        'latitude',
        'longitude',
    ];
}
