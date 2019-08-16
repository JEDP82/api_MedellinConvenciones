<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePabellonTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Pabellon';

    /**
     * Run the migrations.
     * @table Pabellon
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idPabellon');
            $table->string('pabellonUbicacion', 45)->nullable();
            $table->integer('pabellonCapacidad')->nullable();
            $table->integer('id_Evento');

            $table->index(["id_Evento"], 'fk_Pabellon_Evento1_idx');


            $table->foreign('id_Evento', 'fk_Pabellon_Evento1_idx')
                ->references('idEvento')->on('Evento')
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
