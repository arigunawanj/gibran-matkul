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
        Schema::create('subcapaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurikulum_id');
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('kurikulum_id')->references('id')->on('kurikulum')->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('matkul_id')->references('id')->on('matkul')->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcapaian');
    }
};
