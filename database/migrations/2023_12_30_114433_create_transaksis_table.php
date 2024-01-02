<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tiket_id'); // Kolom untuk foreign key
            $table->string('nama_pembeli');
            $table->date('tgl_transaksi');
            $table->integer('jumlah');
            $table->string('total');
            $table->string('jum_bayar');
            $table->string('kembalian');
            $table->string('sisa');
            $table->timestamps();

            // Mendefinisikan foreign key
            $table->foreign('tiket_id')
                ->references('id')
                ->on('tikets')
                ->onDelete('cascade'); // Aksi yang akan diambil saat tiket terkait dihapus
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
