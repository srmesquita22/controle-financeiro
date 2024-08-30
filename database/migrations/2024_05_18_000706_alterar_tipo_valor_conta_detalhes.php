<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterarTipoValorContaDetalhes extends Migration
{
    public function up()
    {
        Schema::table('conta_detalhes', function (Blueprint $table) {
            $table->decimal('valor', 12, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('conta_detalhes', function (Blueprint $table) {
            $table->decimal('valor', 10, 2)->change();
        });
    }
}

