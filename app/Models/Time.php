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

    public function membros()
    {
        return $this->hasMany(Funcionario::class, 'time_id', 'id');
    }

    public function lider()
    {
        return $this->belongsTo(Funcionario::class, 'lider_id', 'id');
    }

}
