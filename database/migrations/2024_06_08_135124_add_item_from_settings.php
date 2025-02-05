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
        \App\Models\Setting::query()
            ->create([
                    'name' => 'Условия использования телеграм бота',
                    'value' => 'https://google.com',
                    'key' => 'terms_telegram_bot',
                ]);

        \App\Models\Setting::query()
            ->create([
                'name' => 'Инструкция по системе Договор 24',
                'value' => 'https://google.com',
                'key' => 'instructions_dogovor_24',
            ]);

        \App\Models\Setting::query()
            ->create([
                'name' => 'Переход на сайт Договор 24',
                'value' => 'https://google.com',
                'key' => 'register_link_dogovor_24',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
