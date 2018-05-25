<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilPermissaoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'perfil_permissao';

    /**
     * Run the migrations.
     * @table perfil_permissao
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('perfil_id');
            $table->integer('usuario_id');
            $table->integer('permissao_id');

            $table->index(["usuario_id"], 'fk_perfil_permissao_usuario1_idx');

            $table->index(["permissao_id"], 'fk_perfil_permissao_permissao1_idx');

            $table->index(["perfil_id"], 'fk_perfil_permissao_perfil1_idx');


            $table->foreign('perfil_id', 'fk_perfil_permissao_perfil1_idx')
                ->references('id')->on('perfil')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('usuario_id', 'fk_perfil_permissao_usuario1_idx')
                ->references('id')->on('usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('permissao_id', 'fk_perfil_permissao_permissao1_idx')
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
