<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'id_empresa',
        'id_evento_externo',
        'chave_issue',
        'id_usuario_app',
        'tipo_evento',
        'data_evento',
        'payload',
    ];

    protected function casts(): array
    {
        return [
            'data_evento' => 'datetime',
            'payload' => 'array',
        ];
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function gatilhos(): HasMany
    {
        return $this->hasMany(Gatilho::class, 'id_evento');
    }
}
