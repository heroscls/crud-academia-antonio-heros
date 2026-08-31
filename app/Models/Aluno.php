<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'objetivo',
        'plano_id',
    ];

     protected $casts = [
        'data_nascimento' => 'date',
    ];
    
    public function plano(): BelongsTo
    {
        return $this->belongsTo(Plano::class);
    }
}