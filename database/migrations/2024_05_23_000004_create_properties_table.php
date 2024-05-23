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
        Schema::create('properties', function (Blueprint $table) {
            $table->id(); // This is an unsignedBigInteger by default
            $table->string('title');
            $table->string('description');
            $table->string('city');
            $table->string('type');
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
