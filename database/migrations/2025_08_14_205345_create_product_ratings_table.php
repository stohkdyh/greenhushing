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
        Schema::create('product_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('respondent_id');
            $table->string('product_name'); // onephone, xarelphone, neuphone, zenophone
            $table->integer('rating')->unsigned()->between(1, 10);
            $table->timestamps();

            $table->foreign('respondent_id')->references('id')->on('respondents')->onDelete('cascade');
            $table->unique(['respondent_id', 'product_name']); // Prevent duplicate ratings for same product
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ratings');
    }
};
