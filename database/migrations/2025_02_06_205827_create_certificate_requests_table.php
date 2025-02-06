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
        Schema::create('certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('iin');
            $table->string('activity_type');
            $table->string('specialty');
            $table->string('phone');
            $table->string('workplace');
            $table->string('sender_name');
            $table->string('document')->nullable();
            $table->string('chat_id');
            $table->string('status')->default('new');
            $table->string('certificate_number')->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });

//                    'last_name' => $notes['last_name'],
//                    'first_name' => $notes['first_name'],
//                    'middle_name' => $notes['middle_name'],
//                    'iin' => $notes['iin'],
//                    'activity_type' => $notes['activity_type'],
//                    'specialty' => $notes['specialty'],
//                    'phone' => $notes['phone'],
//                    'workplace' => $notes['workplace'],
//                    'sender_name' => $notes['sender_name'],
//                    'document' => $notes['document'],
//                    'chat_id' => $chat_id,
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_requests');
    }
};
