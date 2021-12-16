<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('instansi');
            $table->integer('jumlah');
            $table->string ('tujuan');
            $table->string ('keperluan');
            $table->string('email');
            $table->boolean('status')->default(0)->nullable();
            $table->time('jamkeluar')->nullable();
            $table->text('phone');
            $table->string('sign');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('guestbook');
    }
}
