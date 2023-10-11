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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('time_id')->after('id');
            $table->foreign('time_id')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('time_id')->after('id');
            $table->foreign('time_id')->references('id')->on('times');
        });
    }
};
