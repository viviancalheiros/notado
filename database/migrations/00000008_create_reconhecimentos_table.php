<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reconhecimentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_gestor')
                ->constrained('funcionarios', 'id')
                ->restrictOnDelete();
            $table->foreignId('id_funcionario')
                ->constrained('funcionarios', 'id')
                ->cascadeOnDelete();
            // Um gatilho gera no máximo um reconhecimento
            $table->foreignId('id_gatilho')
                ->nullable()
                ->unique()
                ->constrained('gatilhos', 'id')
                ->nullOnDelete();

            $table->string('titulo');
            $table->text('mensagem');
            $table->string('visibilidade')->default('privado');
            $table->dateTime('data_criacao')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reconhecimentos');
    }
};