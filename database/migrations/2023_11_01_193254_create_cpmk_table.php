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
        Schema::create('cpmk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('m_cpl_id');
            $table->unsignedBigInteger('kurikulum_id');
            $table->foreign('kurikulum_id')->references('id')->on('kurikulum')->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('m_cpl_id')->references('id')->on('m_cpl')->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->string('nama_kurikulum');
            $table->string('nama_cpl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpmk');
    }
};
