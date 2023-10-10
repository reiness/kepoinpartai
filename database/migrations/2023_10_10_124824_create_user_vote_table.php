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
        Schema::create('user_vote', function (Blueprint $table) {
            $table->string('user_email', 100);
            $table->unsignedBigInteger('id_partai');
            $table->foreign('id_partai')->references('id_partai')->on('profile_partai')->onDelete('cascade');
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->unique('user_email');
        });

        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vote');
    }
};
