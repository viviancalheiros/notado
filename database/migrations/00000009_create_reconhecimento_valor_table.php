<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reconhecimento_valor', function (Blueprint $table) {
            $table->foreignId('id_reconhecimento')
                ->constrained('reconhecimentos', 'id')
                ->cascadeOnDelete();
            $table->foreignId('id_valor')
                ->constrained('valores', 'id')
                ->cascadeOnDelete();

            $table->primary(['id_reconhecimento', 'id_valor']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reconhecimento_valor');
    }
};