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
        Schema::create('final_product_choices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('respondent_id');
            $table->string('product_name'); // onephone, xarelphone, neuphone, zenophone
            $table->timestamps();
            
            $table->foreign('respondent_id')->references('id')->on('respondents');
            $table->unique('respondent_id'); // Only one final choice per respondent
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_product_choices');
    }
};
