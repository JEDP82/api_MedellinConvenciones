<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaservicioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'EmpresaServicio';

    /**
     * Run the migrations.
     * @table EmpresaServicio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idEmpresaServicio');
            $table->string('antiguedad', 45)->nullable();
            $table->integer('TiposEmpresa_EmpresaServicio');

            $table->index(["TiposEmpresa_EmpresaServicio"], 'fk_EmpresaServicio_TiposEmpresa1_idx');


            $table->foreign('TiposEmpresa_EmpresaServicio', 'fk_EmpresaServicio_TiposEmpresa1_idx')
                ->references('tipoEmpresa')->on('TiposEmpresa')
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
