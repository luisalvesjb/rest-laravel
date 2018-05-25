<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponenteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'componente';

    /**
     * Run the migrations.
     * @table componente
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo', 80);
            $table->string('descricao')->nullable();
            $table->integer('tamanho');
            $table->integer('ordem');
            $table->boolean('ativo')->default('1');
            $table->integer('id_categoria')->nullable();
            $table->integer('tipo_componente_id');

            $table->index(["tipo_componente_id"], 'fk_componente_tipo_componente1_idx');

            $table->index(["id_categoria"], 'fk_id_categoria_idx');


            $table->foreign('id_categoria', 'fk_id_categoria_idx')
                ->references('id')->on('categoria')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_componente_id', 'fk_componente_tipo_componente1_idx')
                ->references('id')->on('tipo_componente')
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
