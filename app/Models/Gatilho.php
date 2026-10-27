<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gatilho extends Model
{
    protected $table = 'gatilhos';

    protected $fillable = [
        'id_empresa',
        'id_funcionario',
        'id_gestor',
        'id_evento',
        'tipo_gatilho',
        'data_ocorrencia',
        'status',
        'contexto',
    ];

    protected function casts(): array
    {
        return [
            'data_ocorrencia' => 'datetime',
            'contexto' => 'array',
        ];
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'id_gestor');
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }

    public function reconhecimento(): HasOne
    {
        return $this->hasOne(Reconhecimento::class, 'id_gatilho');
    }
}
