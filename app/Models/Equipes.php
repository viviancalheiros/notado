<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipe extends Model
{
    protected $table = 'equipes';

    protected $fillable = [
        'id_empresa',
        'nome',
        'descricao',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }

    public function funcionarios(): BelongsToMany
    {
        return $this->belongsToMany(
            Funcionario::class,
            'membro_equipe',
            'id_equipe',
            'id_funcionario'
        )->withPivot('data_inicio', 'data_fim');
    }
}
