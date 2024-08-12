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
        Schema::table('attendances', function (Blueprint $table) {
            //
            $table->string('department')->nullable();
            $table->string('team')->nullable();
            $table->decimal('unit_price', 8,2)->nullable();
            $table->decimal('cost_price',8,2)->nullable();
            $table->string('skill_rank')->nullable();
            $table->decimal('work_hours',5,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            //
            $table->dropColumn(['department','team','unit_price','cost_price','skill_rank','work_hours']);

        });
    }
};
