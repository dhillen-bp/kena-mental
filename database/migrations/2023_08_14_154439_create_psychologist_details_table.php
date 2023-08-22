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
        Schema::create('psychologist_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('psychologist_id', 4);
            $table->foreign('psychologist_id')->references('id')->on('psychologists')->onDelete('restrict');
            $table->string('university');
            $table->year('year');
            $table->string('degree');
            $table->string('topics');
            $table->unsignedInteger('session_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psychologist_details');
    }
};
