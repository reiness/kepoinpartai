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
        Schema::create('feedback', function (Blueprint $table) {
            // Mengganti kolom 'id' menjadi 'feedback_id' sebagai primary key
            $table->id('feedback_id');
            $table->string('nama', 100)->default('Anonymous');
            $table->string('email', 50);

            // Menambahkan foreign key constraint untuk kolom 'email'
            $table->foreign('email')
                ->references('email')
                ->on('users')
                ->onDelete('cascade'); // Asumsi penghapusan kaskade jika email pengguna dihapus

            $table->string('feedbacks', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
