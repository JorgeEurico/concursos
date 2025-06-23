<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membro_juris', function (Blueprint $table) {
            $table->unsignedBigInteger('projecto_id')->nullable()->after('disponivel'); // Adiciona a coluna projeto_id após a coluna 'id'
            $table->foreign('projecto_id')->references('id')->on('projectos')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membro_juris', function (Blueprint $table) {
            //
        });
    }
};
