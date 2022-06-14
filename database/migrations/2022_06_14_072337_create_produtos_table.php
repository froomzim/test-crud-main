<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->unique();
            $table->longText('descricao')->unique();
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->decimal('preco_compra', 12,3)->default(0);
            $table->decimal('preco_venda', 12,3)->default(0);
            $table->integer('estoque')->nullable()->default(1);
            $table->boolean('situacao')->nullable();
            $table->string('uri')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
