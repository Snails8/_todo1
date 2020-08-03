<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('task_name', 50);
            $table->string('task_contents', 500)->nullable();
            $table->char('status_id', 2);
            $table->date('due_date')->nullable();
            $table->timestamps();
            $table->foreign('status_id')->references('status_id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
