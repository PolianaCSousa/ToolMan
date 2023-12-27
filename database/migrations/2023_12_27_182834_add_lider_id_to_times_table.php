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
        Schema::table('times', function (Blueprint $table) {
            $table->unsignedBigInteger('lider_id')->after('id');
            $table->foreign('lider_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('times', function (Blueprint $table) {
            $table->unsignedBigInteger('lider_id')->after('id');
            $table->foreign('lider_id')->references('id')->on('funcionarios');
        });
    }
};
