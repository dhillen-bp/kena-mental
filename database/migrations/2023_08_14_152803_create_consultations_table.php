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
        Schema::create('consultations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->char('psychologist_id', 4);
            $table->foreign('psychologist_id')->references('id')->onUpdate('restrict')->on('psychologists')->onDelete('restrict');
            $table->text('notes');
            $table->dateTime('booking_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
