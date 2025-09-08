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
            for ($i = 1; $i <= 31; $i++) {
                $table->integer("q$i")->nullable(); // simpan jawaban 1–7
            }
            $table->timestamps();
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
