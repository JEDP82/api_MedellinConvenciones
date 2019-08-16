<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Evento';

    /**
     * Run the migrations.
     * @table Evento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idEvento');
            $table->string('eventoNombre', 45)->nullable();
            $table->date('eventoFecha')->nullable();
            $table->integer('id_Responsable');

            $table->index(["id_Responsable"], 'fk_Evento_Responsable_idx');


            $table->foreign('id_Responsable', 'fk_Evento_Responsable_idx')
                ->references('idResponsable')->on('Responsable')
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
