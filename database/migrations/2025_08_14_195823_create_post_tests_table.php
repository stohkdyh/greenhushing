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
        Schema::create('post_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respondent_id')->constrained()->onDelete('cascade');
            $table->string('product_name'); // Add product name to track which product this post-test is for
            
            // Intention to buy (1-10)
            $table->integer('intention_to_buy')->nullable();
            
            // For post-test questions (pt_q1 to pt_q31)
            for ($i = 1; $i <= 40; $i++) {
                $table->integer("pt_q$i")->nullable();
            }
            
            // Store manipulation check responses
            $table->text('manipulation_answers')->nullable();
            
            $table->timestamps();
            
            // Ensure one post-test per respondent per product
            $table->unique(['respondent_id', 'product_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tests');
    }
};
