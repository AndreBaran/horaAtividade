<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mensagem')->nullable();
            $table->boolean('status')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('color',7)->nullable();
            $table->unsignedBigInteger('professor_id')->nullable()->index();
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->unsignedBigInteger('tipoatividade_id')->nullable()->index();
            $table->foreign('tipoatividade_id')->references('id')->on('tipo_atividades');
            $table->unsignedBigInteger('escola_id')->nullable()->index();
            $table->foreign('escola_id')->references('id')->on('escolas');
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagems');
    }
}
