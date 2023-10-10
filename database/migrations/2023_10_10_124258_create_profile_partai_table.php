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
        Schema::create('profile_partai', function (Blueprint $table) {
            // Mengganti kolom 'id' menjadi 'id_partai' sebagai primary key
            $table->id('id_partai');
            $table->string('nama_partai', 100);
            $table->string('ketua_umum', 100);
            $table->integer('jumlah_kasus_suap_gratifikasi');
            $table->integer('nominal_suap_gratifikasi');
            $table->integer('nominal_kasus_korupsi');
            $table->integer('jumlah_kasus_korupsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_partai');
    }
};
