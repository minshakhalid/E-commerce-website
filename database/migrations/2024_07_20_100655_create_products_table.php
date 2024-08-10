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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->decimal('price')->nullable();
            $table->float('rating')->nullable();
            $table->text('description')->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('min_weight')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('quality')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
