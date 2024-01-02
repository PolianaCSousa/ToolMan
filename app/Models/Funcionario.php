<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cargo',
        'codigo',
        'salario',
        'telefone',
    ];

    public function faturamento(){

        return $this->hasMany(Faturamento::class, 'funcionario_id', 'id');
    
    }

    public function time(){

        return $this->belongsTo(Time::class, 'time_id', 'id');

    }

    public function lideranca()
    {
        return $this->hasOne(Time::class, 'lider_id', 'id');
    }

}
