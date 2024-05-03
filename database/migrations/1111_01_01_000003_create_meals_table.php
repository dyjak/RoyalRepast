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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('restaurant_id')->unsigned();
                $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->bigInteger('category_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('meal_categories');
            $table->string('name');
            $table->float('price');
            $table->string('image_path')->nullable();
            $table->string('description')->nullable();
            $table->string('description2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
