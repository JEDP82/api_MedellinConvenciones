<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Grupo';

    /**
     * Run the migrations.
     * @table Grupo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idGrupo');
            $table->string('grupoParticipantes', 190)->nullable();
            $table->integer('Empresa_idEmpresa');

            $table->index(["Empresa_idEmpresa"], 'fk_Grupo_Empresa1_idx');


            $table->foreign('Empresa_idEmpresa', 'fk_Grupo_Empresa1_idx')
                ->references('idEmpresa')->on('Empresa')
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
