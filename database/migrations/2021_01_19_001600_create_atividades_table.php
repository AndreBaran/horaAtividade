<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color',7);
            $table->unsignedBigInteger('professor_id')->nullable()->index();
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->unsignedBigInteger('atividade_id')->nullable()->index();
            $table->foreign('atividade_id')->references('id')->on('atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
}
