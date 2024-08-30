<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conta_id');
            $table->date('dt_pagamento');
            $table->string('descricao');
            $table->decimal('valor', 8, 2);
            $table->timestamps();

            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conta_detalhes');
    }
}
