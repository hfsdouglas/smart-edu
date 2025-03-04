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
        Schema::create('classes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
