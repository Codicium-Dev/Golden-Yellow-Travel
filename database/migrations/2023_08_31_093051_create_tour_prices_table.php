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
        Schema::create('tour_prices', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->foreignId('tour_id')->constrained()->cascadeOnDelete();
            $table->string('category');
            $table->double('price')->nullable();
            $table->double('sale_price');
            $table->double('private_price')->nullable();
            $table->double('sale_private_price')->nullable();
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_prices');
    }
};
