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
        Schema::create('faturamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('funcionario_id');
            $table->date('data');
            $table->decimal('valor', $precision = 10, $scale = 2);
            $table->string('observacoes', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faturamentos');
    }
};
