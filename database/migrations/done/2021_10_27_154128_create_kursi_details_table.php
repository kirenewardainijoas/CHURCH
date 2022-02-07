<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKursiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursi_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->string('seat',255);
            $table->string('status',255);
            $table->string('description',255)->nullable(true);
            $table->timestamps();

            $table->foreign('seat')->on('kursis')->references('seat')->onDelete('update');
            $table->foreign('jadwal_id')->on('jadwals')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursi_details');
    }
}
