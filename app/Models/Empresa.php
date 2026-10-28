<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nome',
    ];

    public function funcionarios(): HasMany
    {
        return $this->hasMany(Funcionario::class, 'id_empresa', 'id');
    }

    public function equipes(): HasMany
    {
        return $this->hasMany(Equipe::class, 'id_empresa', 'id');
    }

    public function eventos()
    {
        return $this->hasMany(Eventos::class, 'id_empresa');
    }

    public function gatilhos()
    {
        return $this->hasMany(Gatilho::class, 'id_empresa');
    }

    public function valores()
    {
        return $this->hasMany(Valor::class, 'id_empresa');
    }
}
