<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'permissao';

    /**
     * Run the migrations.
     * @table permissao
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('descricao')->nullable();
            $table->string('classe', 180)->nullable();
            $table->string('metodo', 180)->nullable();
            $table->integer('permissao_id');

            $table->index(["permissao_id"], 'fk_permissao_permissao1_idx');


            $table->foreign('permissao_id', 'fk_permissao_permissao1_idx')
                ->references('id')->on('permissao')
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
