<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itenspedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->dateTime('emissao');
            $table->integer('quantidate');
            $table->decimal('valorUnitario', 10,2);
            $table->foreign('pedido_id')->references('id')
                ->on('pedidos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')
                ->on('produtos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itenspedidos');
    }
};
