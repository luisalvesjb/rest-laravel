<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPostTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tag_post';

    /**
     * Run the migrations.
     * @table tag_post
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_tag_post');
            $table->integer('id_tag');
            $table->integer('id_post');

            $table->index(["id_post"], 'fk_tag_has_post_post1_idx');

            $table->index(["id_tag"], 'fk_tag_has_post_tag1_idx');


            $table->foreign('id_tag', 'fk_tag_has_post_tag1_idx')
                ->references('id')->on('tag')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_post', 'fk_tag_has_post_post1_idx')
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
