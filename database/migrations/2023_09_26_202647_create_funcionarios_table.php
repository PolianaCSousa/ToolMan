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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('time_id');
            $table->string('nome', 100);
            $table->string('cargo', 30);
            $table->string('codigo', 7);
            $table->decimal('salario', $precision = 7, $scale = 2);
            $table->string('telefone', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
