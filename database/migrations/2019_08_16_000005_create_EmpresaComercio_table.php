<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresacomercioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'EmpresaComercio';

    /**
     * Run the migrations.
     * @table EmpresaComercio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idEmpresaComercio');
            $table->string('filosofia', 45)->nullable();
            $table->integer('TiposEmpresa_EmpresaServicio');

            $table->index(["TiposEmpresa_EmpresaServicio"], 'fk_EmpresaComercio_TiposEmpresa1_idx');


            $table->foreign('TiposEmpresa_EmpresaServicio', 'fk_EmpresaComercio_TiposEmpresa1_idx')
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
