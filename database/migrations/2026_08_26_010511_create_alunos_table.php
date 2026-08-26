<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {

            $table->id();

            $table->string('nome');

            $table->string('email')->unique();

            $table->string('telefone');

            $table->date('data_nascimento');

            $table->text('objetivo');

            $table->foreignId('plano_id')
                ->constrained('planos')
                ->restrictOnDelete();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};