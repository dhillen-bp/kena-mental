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
        Schema::create('test_results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->char('test_id', 5);
            $table->foreign('test_id')->references('id')->on('mental_tests')->onDelete('restrict');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('test_questions');
            $table->foreignUuid('answer_id')->references('id')->on('test_answers')->onDelete('restrict');
            $table->timestamp('test_completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
