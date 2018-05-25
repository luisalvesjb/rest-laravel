<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'post';

    /**
     * Run the migrations.
     * @table post
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->string('titulo_slug');
            $table->longText('texto')->nullable();
            $table->text('descricao')->nullable();
            $table->integer('id_categoria')->nullable();

            $table->index(["id_categoria"], 'fk_id_categoria_idx');


            $table->foreign('id_categoria', 'fk_id_categoria_idx')
                ->references('id')->on('categoria')
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
