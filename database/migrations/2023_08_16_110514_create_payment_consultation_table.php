<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_consultation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('consultation_id')->references('id')->on('consultations')->onDelete('restrict');
            $table->bigInteger('total_price');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_consultation');
    }
};
