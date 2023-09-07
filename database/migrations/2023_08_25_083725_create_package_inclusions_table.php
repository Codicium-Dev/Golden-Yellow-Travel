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
        Schema::create('package_inclusions', function (Blueprint $table) {
            $table->snowflakeIdAndPrimary();
            $table->foreignId('package_tour_id')->constrained()->cascadeOnDelete();
            $table->string('meals')->nullable();
            $table->string('transport')->nullable();
            $table->string('accommodation')->nullable();
            $table->longText('included_activities')->nullable();
            $table->auditColumns();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_inclusions');
    }
};
