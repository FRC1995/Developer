<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosPrecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_precos', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('preco_id');
            $table->timestamps();

            ////Relacionando com a tabela 
            $table->foreign('produto_id')->references('produto_id')->on('produtos');
            $table->foreign('preco_id')->references('preco_id')->on('precos')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_precos');
    }
}
