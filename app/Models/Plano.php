<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plano extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'duracao_dias',
        'status',
    ];

    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }
}