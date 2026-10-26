<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evento_jira', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')
                ->constrained('empresas', 'id')
                ->cascadeOnDelete();
            $table->string('id_evento_externo');
            $table->string('chave_issue')->index();
            $table->string('id_usuario_jira')->nullable();
            $table->string('tipo_evento');
            $table->dateTime('data_evento');
            $table->json('payload')->nullable();
            $table->timestamps();

            // Evita processar o mesmo evento do Jira duas vezes
            $table->unique(['id_empresa', 'id_evento_externo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evento_jira');
    }
};