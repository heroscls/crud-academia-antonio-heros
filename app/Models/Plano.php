<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plano extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'duracao_dias',
        'status',
    ];

    public function alunos()
    {
        // precisa da classe ALuno
        // return $this->hasMany(Aluno::class);
    }
}
