<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('theme_slug')->nullable()->after('custom_note');
            $table->string('theme_name')->nullable()->after('theme_slug');
            $table->string('theme_category')->nullable()->after('theme_name');
            $table->string('theme_link')->nullable()->after('theme_category');
            $table->string('client_name')->nullable()->change();
            $table->string('client_wa')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['theme_slug', 'theme_name', 'theme_category', 'theme_link']);
            $table->string('client_name')->nullable(false)->change();
            $table->string('client_wa')->nullable(false)->change();
        });
    }
};
