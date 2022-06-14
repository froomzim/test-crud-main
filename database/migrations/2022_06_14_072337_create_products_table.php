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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->longText('description')->unique();
            $table->foreignId('category_id')->constrained('categories');
            $table->decimal('buy_price', 12,3)->default(0);
            $table->decimal('sell_price', 12,3)->default(0);
            $table->integer('inventory')->nullable()->default(1);
            $table->boolean('situation')->nullable();
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
        Schema::dropIfExists('products');
    }
};
