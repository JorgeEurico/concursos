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
        Schema::create('comissao_recepcao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concurso_id')->constrained('concursos')->onDelete('cascade');
            $table->foreignId('membro_id')->constrained('membro_juris')->onDelete('cascade');
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
        Schema::dropIfExists('comissao_recepcao');
    }
};
