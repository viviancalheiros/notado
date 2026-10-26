<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Valores extends Model
{
    protected $table = 'valores';

    protected $fillable = [
        'id_empresa',
        'nome',
        'descricao',
        'ativo',
    ];

    protected function casts(): array
    {
        return [
            'ativo' => 'boolean',
        ];
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }

    public function reconhecimentos(): BelongsToMany
    {
        return $this->belongsToMany(
            Reconhecimento::class,
            'reconhecimento_valor',
            'id_valor',
            'id_reconhecimento'
        );
    }
}
