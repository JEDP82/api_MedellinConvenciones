<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Stands';

    /**
     * Run the migrations.
     * @table Stands
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('idStands');
            $table->integer('id_evento')->nullable();

            $table->index(["id_evento"], 'fk_Stands_Evento_idx');


            $table->foreign('id_evento', 'fk_Stands_Evento_idx')
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
