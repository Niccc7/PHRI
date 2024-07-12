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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pic');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('nama_perusahaan');
            $table->text('jenis_kerjasama');
            $table->unsignedBigInteger('jenis_usaha_id');
            $table->enum('status',["diterima","ditolak", "n/a"])->default('n/a');
            $table->foreign('jenis_usaha_id')->references('id')->on('jenis_usahas')->onDelete('cascade');
            $table->string('alasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};