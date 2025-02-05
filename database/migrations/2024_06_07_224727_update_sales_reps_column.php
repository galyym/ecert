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
        Schema::table('sales_reps', function (Blueprint $table) {
            $table->unique('email');
            $table->unique('phone_number');
            $table->unique('iin_bin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_reps', function (Blueprint $table) {
            $table->dropUnique(['email']);
            $table->dropUnique(['phone_number']);
            $table->dropUnique(['iin_bin']);
        });
    }
};
