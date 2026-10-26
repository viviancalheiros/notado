<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_empresa')
                ->constrained('empresas', 'id')
                ->cascadeOnDelete();
            // auto-relacionamento: gestor também é um funcionário
            $table->foreignId('id_gestor')
                ->nullable()
                ->constrained('funcionarios', 'id')
                ->nullOnDelete();

            $table->string('nome');
            $table->string('email')->unique();
            $table->date('data_nascimento')->nullable();
            $table->date('data_admissao')->nullable();
            $table->date('data_desligamento')->nullable();
            $table->string('cargo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};