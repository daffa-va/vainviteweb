<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Superseded by recreate_prices_table migration
    }

    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
