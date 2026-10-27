<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gatilhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')
                ->constrained('empresas', 'id')
                ->cascadeOnDelete();

            // funcionário que originou o gatilho
            $table->foreignId('id_funcionario')
                ->constrained('funcionarios', 'id')
                ->cascadeOnDelete();
            // gestor que deve agir sobre o gatilho
            $table->foreignId('id_gestor')
                ->constrained('funcionarios', 'id')
                ->restrictOnDelete();

            $table->foreignId('id_evento')
                ->nullable()
                ->constrained('eventos', 'id')
                ->nullOnDelete();

            $table->string('tipo_gatilho');
            $table->dateTime('data_ocorrencia');
            $table->string('status')->default('pendente');
            $table->json('contexto')->nullable();
            $table->timestamps();

            $table->index(['id_gestor', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gatilhos');
    }
};