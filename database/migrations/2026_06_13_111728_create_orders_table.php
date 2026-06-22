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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_id')->nullable()->constrained()->onDelete('set null');
            $table->string('client_name');
            $table->string('client_wa');
            $table->integer('total_price')->nullable();
            $table->text('custom_note')->nullable();
            $table->enum('status', ['pending', 'progress', 'done', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
