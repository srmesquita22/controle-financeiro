<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'tipo', 'valor', 'data', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function detalhes()
    {
        return $this->hasMany(ContaDetalhe::class, 'conta_id', 'id');
    }
}
