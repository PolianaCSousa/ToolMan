<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'produto_id',
        'quantidade',
        'data',
    ];

    public function vendedor()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}

