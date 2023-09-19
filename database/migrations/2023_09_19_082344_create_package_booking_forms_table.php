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
        Schema::create('package_booking_forms', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->foreignId("package_tour_id")->constrained()->cascadeOnDelete();
            $table->integer("adult");
            $table->integer("child")->nullable();
            $table->integer("infants")->nullable();
            $table->string("date");
            $table->string("arrival_airport");
            $table->string("tour_type");
            $table->string("accommodation");
            $table->longText("special_req");
            $table->string("gender");
            $table->string("full_name");
            $table->string("email");
            $table->string("phone");
            $table->string("country");
            $table->string("city");
            $table->string("social_media");
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_booking_forms');
    }
};
