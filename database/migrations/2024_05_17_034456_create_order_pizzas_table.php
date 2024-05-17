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
        Schema::create('order_pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('orderId');
            $table->string('size');
            $table->boolean('pepperoni');
            $table->boolean('cheese');
            $table->integer('price');
            $table->timestamps();

            $table->foreignId('pizzaId')->constrained('pizzas');
            $table->foreignId('userId')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_pizzas');
    }
};
