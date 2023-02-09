<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\once;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_singers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('song_id');
            $table->unsignedBigInteger('singer_id');
            $table->foreign('song_id')->references('id')->on('songs');
            $table->foreign('singer_id')->references('id')->on('singers');
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
        Schema::dropIfExists('song_singers');
    }
};
