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
        Schema::create('respondents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('country', ['IDN', 'JPN']);
            $table->float('GPA');
            $table->enum('work_experience', [
                'none',
                '<1_year',
                '1-2_years',
                '2-3_years',
                '>3_years'
            ]);
            $table->enum('last_education', [
                'senior_high',
                'diploma',
                'bachelor',
                'master',
                'doctoral'
            ]);
            $table->enum('product_type', ['Greenwashing', 'Greenhushing'])->nullable();
            $table->string('final_product')->nullable();
            $table->time('time_completion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondents');
    }
};
