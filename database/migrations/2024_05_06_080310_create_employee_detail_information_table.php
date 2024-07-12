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
        Schema::create('employee_detail_information', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_karyawan_tetap');
            $table->integer('jumlah_karyawan_kontrak');
            $table->integer('jumlah_karyawan_harian');
            $table->integer('jumlah_karyawan_outsource');
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
        Schema::dropIfExists('employee_detail_information');
    }
};
