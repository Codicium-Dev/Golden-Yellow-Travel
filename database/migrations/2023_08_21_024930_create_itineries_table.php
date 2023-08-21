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
        Schema::create('itineries', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->string('description');
            $table->string('meal');
            $table->string('accommodation');
            $table->string('note');
            $table->string('itinerary_photo');
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineries');
    }
};
