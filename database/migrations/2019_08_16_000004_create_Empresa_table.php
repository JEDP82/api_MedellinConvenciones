<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Empresa';

    /**
     * Run the migrations.
     * @table Empresa
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idEmpresa');
            $table->string('empresaNombre', 45)->nullable();
            $table->integer('TiposEmpresa_EmpresaServicio');
            $table->integer('ProductoEmpresa_idProductoEmpresa');

            $table->index(["ProductoEmpresa_idProductoEmpresa"], 'fk_Empresa_ProductoEmpresa1_idx');

            $table->index(["TiposEmpresa_EmpresaServicio"], 'fk_Empresa_TiposEmpresa1_idx');


            $table->foreign('TiposEmpresa_EmpresaServicio', 'fk_Empresa_TiposEmpresa1_idx')
                ->references('tipoEmpresa')->on('TiposEmpresa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ProductoEmpresa_idProductoEmpresa', 'fk_Empresa_ProductoEmpresa1_idx')
                ->references('idProductoEmpresa')->on('ProductoEmpresa')
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
