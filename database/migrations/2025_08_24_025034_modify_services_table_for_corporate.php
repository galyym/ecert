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
        Schema::table('services', function (Blueprint $table) {
            // Добавляем новые колонки для корпоративных услуг
            if (!Schema::hasColumn('services', 'title')) {
                $table->string('title')->after('id');
            }
            if (!Schema::hasColumn('services', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (!Schema::hasColumn('services', 'icon')) {
                $table->string('icon')->nullable()->after('description');
            }
            if (!Schema::hasColumn('services', 'features')) {
                $table->json('features')->nullable()->after('icon');
            }
            if (!Schema::hasColumn('services', 'price')) {
                $table->decimal('price', 10, 2)->nullable()->after('features');
            }
            if (!Schema::hasColumn('services', 'duration')) {
                $table->string('duration')->nullable()->after('price');
            }
            if (!Schema::hasColumn('services', 'category')) {
                $table->string('category')->nullable()->after('duration');
            }
            if (!Schema::hasColumn('services', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('category');
            }
            if (!Schema::hasColumn('services', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('is_active');
            }
            
            // Добавляем индексы
            $table->index(['is_active', 'category', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Удаляем добавленные колонки при откате
            $table->dropColumn([
                'title', 'description', 'icon', 'features', 
                'price', 'duration', 'category', 'is_active', 'sort_order'
            ]);
        });
    }
};
