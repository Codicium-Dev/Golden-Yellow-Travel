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
        Schema::create('booking_forms', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->foreignId("tour_id")->constrained()->cascadeOnDelete();
            $table->string("gender");
            $table->string("full_name");
            $table->string("email");
            $table->string("phone")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("social_media")->nullable();
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_forms');
    }
};
