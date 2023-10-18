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
        Schema::create('ponto_coletas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('nome');
            $table->String('complemento');
            $table->String('longetude');
            $table->String('latitude');
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponto_coletas');
    }
};
