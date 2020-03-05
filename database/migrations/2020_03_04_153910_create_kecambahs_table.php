<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecambahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecambahs', function (Blueprint $table) {
            $table->bigIncrements('kecambah_id');
            $table->string('nama');
            $table->string('pembeli');
            $table->bigInteger('jumlah');
            $table->bigInteger('harga');
            $table->bigInteger('jumlah_bayar');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecambahs');
    }
}
