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
        Schema::create('legal_information', function (Blueprint $table) {
            $table->id();
            $table->string('nama_badan_hukum_perusahaan');
            $table->string('nomor_akte_pendirian_perusahaan');
            $table->string('nomor_induk_berusaha')->nullable();
            $table->string('nomor_tdup')->nullable();
            $table->string('nomor_siu_pariwisata')->nullable();
            $table->string('nomor_siu_perdagangan')->nullable();
            $table->string('file');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_information');
    }
};
