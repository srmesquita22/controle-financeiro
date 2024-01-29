<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['titulo', 'descricao', 'tipo', 'valor', 'data'];

}


