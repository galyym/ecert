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
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->json('content')->nullable();
            $table->string('image')->nullable();
            $table->json('features')->nullable();
            $table->json('stats')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['section_key', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
