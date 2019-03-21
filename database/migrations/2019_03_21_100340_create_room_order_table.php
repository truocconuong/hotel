<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdatphong', function (Blueprint $table) {
            $table->integer('phong_id')->unsigned();
            $table->integer('datphong_id')->unsigned();
            $table->dateTime('ngaydat');
            $table->dateTime('ngaytra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdatphong');
    }
}
