<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoPessoa extends Model
{
    protected $fillable = [
        'nome',
        'telefone'
    ];
}
