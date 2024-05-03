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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('restaurant_category_id')->unsigned();
                $table->foreign('restaurant_category_id')->references('id')->on('restaurant_categories');
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->double('ratings')->default(0);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('street');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
