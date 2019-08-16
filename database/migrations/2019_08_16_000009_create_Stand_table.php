<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Stand';

    /**
     * Run the migrations.
     * @table Stand
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idStand');
            $table->string('standLugar', 45)->nullable();
            $table->integer('Pabellon_idPabellon');
            $table->integer('Grupo_idGrupo');

            $table->index(["Grupo_idGrupo"], 'fk_Stand_Grupo1_idx');

            $table->index(["Pabellon_idPabellon"], 'fk_Stand_Pabellon1_idx');


            $table->foreign('Pabellon_idPabellon', 'fk_Stand_Pabellon1_idx')
                ->references('idPabellon')->on('Pabellon')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Grupo_idGrupo', 'fk_Stand_Grupo1_idx')
                ->references('idGrupo')->on('Grupo')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
