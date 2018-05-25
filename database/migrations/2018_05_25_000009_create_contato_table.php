<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'contato';

    /**
     * Run the migrations.
     * @table contato
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('assunto')->nullable();
            $table->text('texto')->nullable();
            $table->dateTime('data')->nullable();
            $table->char('status', 1)->nullable();
            $table->integer('cliente_id');

            $table->index(["cliente_id"], 'fk_contato_cliente1_idx');


            $table->foreign('cliente_id', 'fk_contato_cliente1_idx')
                ->references('id')->on('cliente')
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
