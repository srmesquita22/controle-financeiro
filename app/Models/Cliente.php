<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'ativo'];

    public function contas(): HasMany
    {
        return $this->hasMany(Conta::class);
    }
}

