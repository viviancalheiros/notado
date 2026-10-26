<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reconhecimento extends Model
{
    protected $table = 'reconhecimentos';

    protected $fillable = [
        'id_gestor',
        'id_funcionario',
        'id_gatilho',
        'titulo',
        'mensagem',
        'visibilidade',
        'data_criacao',
    ];

    protected function casts(): array
    {
        return [
            'data_criacao' => 'datetime',
        ];
    }

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'id_gestor');
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    public function gatilho(): BelongsTo
    {
        return $this->belongsTo(Gatilho::class, 'id_gatilho');
    }

    public function valores(): BelongsToMany
    {
        return $this->belongsToMany(
            Valor::class,
            'reconhecimento_valor',
            'id_reconhecimento',
            'id_valor'
        );
    }
}
