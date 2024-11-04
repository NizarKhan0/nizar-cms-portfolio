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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_position', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('company_address', 255)->nullable();
            $table->date('work_start_date')->nullable();
            $table->date('work_end_date')->nullable(); // Allow for current job
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
