<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'arquivo';

    /**
     * Run the migrations.
     * @table arquivo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('url')->nullable();
            $table->boolean('capa')->nullable()->default('0');
            $table->integer('id_post')->nullable();

            $table->index(["id_post"], 'fk_id_post_idx');


            $table->foreign('id_post', 'fk_id_post_idx')
                ->references('id')->on('post')
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
