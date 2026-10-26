<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable = [
        'id_empresa',
        'id_gestor',
        'nome',
        'email',
        'data_nascimento',
        'data_admissao',
        'data_desligamento',
        'cargo',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }

    public function gestor(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'id_gestor', 'id');
    }

    public function subordinados(): HasMany
    {
        return $this->hasMany(Funcionario::class, 'id_gestor', 'id');
    }
    
    public function gatilhosRecebidos()
    {
        return $this->hasMany(Gatilho::class, 'id_funcionario');
    }

    public function gatilhosGerenciados()
    {
        return $this->hasMany(Gatilho::class, 'id_gestor');
    }

    public function reconhecimentosRecebidos()
    {
        return $this->hasMany(Reconhecimento::class, 'id_funcionario');
    }

    public function reconhecimentosCriados()
    {
        return $this->hasMany(Reconhecimento::class, 'id_gestor');
    }

    public function equipes(): BelongsToMany
    {
        return $this->belongsToMany(
            Equipe::class,
            'membro_equipe',
            'id_funcionario',
            'id_equipe'
        )->withPivot('data_inicio', 'data_fim');
    }
}
