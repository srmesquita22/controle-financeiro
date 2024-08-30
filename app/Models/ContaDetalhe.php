<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaDetalhe extends Model
{
    use HasFactory;

    protected $fillable = ['conta_id', 'dt_pagamento', 'descricao', 'valor'];

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'conta_id', 'id');
    }
}
