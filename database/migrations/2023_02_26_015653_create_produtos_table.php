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
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nome");
            $table->decimal("valor", 10,2);
            $table->decimal("valorpromo", 10,2)->nullable();
            $table->text("descricao")->nullable();
            $table->boolean("destaque")->nullable()->default(NULL);
            $table->text("foto");
            $table->integer("categoria_id")->unsigned();
            $table->foreign("categoria_id")->references("id")
                ->on("categorias")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
