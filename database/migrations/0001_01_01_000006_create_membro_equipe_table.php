<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membro_equipe', function (Blueprint $table) {
            $table->foreignId('id_funcionario')
                ->constrained('funcionarios', 'id')
                ->cascadeOnDelete();
            $table->foreignId('id_equipe')
                ->constrained('equipes', 'id')
                ->cascadeOnDelete();
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();

            $table->primary(['id_funcionario', 'id_equipe']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membro_equipe');
    }
};