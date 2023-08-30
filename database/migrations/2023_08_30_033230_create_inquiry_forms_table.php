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
        Schema::create('inquiry_forms', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->string('travel_month');
            $table->string('travel_year');
            $table->integer('stay_days');
            $table->integer('budget');
            $table->integer('adult_count')->default(0);
            $table->integer('child_count')->default(0);
            $table->string('interest');
            $table->string('destinations');
            $table->string('f_name');
            $table->string('l_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('own_country')->nullable();
            $table->string('accommodation')->nullable();
            $table->string('how_u_know')->nullable();
            $table->text('other_information')->nullable();
            $table->text('special_note')->nullable();
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_forms');
    }
};
