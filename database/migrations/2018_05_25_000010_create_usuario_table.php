<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'usuario';

    /**
     * Run the migrations.
     * @table usuario
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->string('login', 20);
            $table->string('senha');
            $table->string('email', 120);
            $table->boolean('ativo');
            $table->integer('perfil_id');

            $table->index(["perfil_id"], 'fk_usuario_perfil1_idx');


            $table->foreign('perfil_id', 'fk_usuario_perfil1_idx')
                ->references('id')->on('perfil')
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
       Schema::dropIfExists($this->set_schema_table);
     }
}
