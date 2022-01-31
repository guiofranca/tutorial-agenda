<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarGrupoContatoPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos_grupos', function (Blueprint $table) {
            $table->foreignId('grupo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contato_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->index(['grupo_id', 'contato_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos_grupos');
    }
}
