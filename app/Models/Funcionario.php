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

        return $this->hasMany(Faturamento::class);
    
    }

    public function time(){

        return $this->belongsTo(Time::class, 'id', 'time_id');

    }

}
