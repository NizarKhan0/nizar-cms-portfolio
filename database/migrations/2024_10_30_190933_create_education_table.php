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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('education_name', 255)->nullable();
            $table->string('institution_name', 255)->nullable();
            $table->string('institution_address', 255)->nullable();
            $table->date('education_start_date')->nullable();
            $table->date('education_end_date')->nullable(); // Allow for current job
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
