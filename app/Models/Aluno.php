<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Note;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
    ];
    public function planos()
    {
        return $this->hasMany(Plano::class);
    }

}
