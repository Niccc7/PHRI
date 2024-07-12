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
        Schema::create('member_owners', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('jabatan');
            $table->string('no_identitas_pemilik');
            $table->string('no_hp_pemilik');
            $table->string('email_pemilik');
            $table->string('nama_pic')->nullable();
            $table->string('jabatan_pic')->nullable();
            $table->string('no_identitas_pic')->nullable();
            $table->string('no_hp_pic')->nullable();
            $table->string('email_pic')->nullable();
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
        Schema::dropIfExists('member_owners');
    }
};