<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'lider_id',
        'nome',
        'descricao',
    ];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function lider()
    {
        return $this->hasOne(Funcionario::class, 'lider_id', 'id');
    }

}
