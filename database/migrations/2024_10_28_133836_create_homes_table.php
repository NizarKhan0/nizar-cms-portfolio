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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('job_title', 255)->nullable();
            $table->string('intro', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('cta_link', 255)->nullable();
            $table->string('cta_text', 100)->nullable();
            $table->string('nizar_image', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
