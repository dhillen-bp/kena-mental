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
        Schema::table('payment_consultation', function (Blueprint $table) {
            $table->foreignUuid('psychologist_id')->after('consultation_id')->references('id')->on('psychologists')->onDelete('restrict');
            $table->foreignUuid('user_id')->after('psychologist_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_consultation', function (Blueprint $table) {
            $table->dropForeign('payment_consultation_psychologist_id_foreign');
            $table->dropForeign('payment_consultation_user_id_foreign');
            $table->dropColumn('psychologist_id');
            $table->dropColumn('user_id');
        });
    }
};
