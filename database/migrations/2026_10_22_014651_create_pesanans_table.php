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
    Schema::create('pesanans', function (Blueprint $table) {
        $table->id();

        $table->string('nama_pelanggan');
        $table->string('tipe');
        $table->text('alamat')->nullable();
        $table->text('catatan')->nullable();

        $table->decimal('total_harga', 12, 2)->default(0);
        $table->string('status')->default('Menunggu');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
