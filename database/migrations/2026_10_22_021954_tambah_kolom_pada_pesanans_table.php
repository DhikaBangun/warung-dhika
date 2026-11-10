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
    Schema::table('pesanans', function (Blueprint $table) {
        $table->string('tipe')->after('nama_pelanggan');
        $table->text('alamat')->nullable()->after('tipe');
        $table->text('catatan')->nullable()->after('alamat');
    });
}


    /**
     * Reverse the migrations.
     */
    
public function down(): void
{
    Schema::table('pesanans', function (Blueprint $table) {
        $table->dropColumn(['tipe', 'alamat', 'catatan']);
    });
}

};
