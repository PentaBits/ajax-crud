<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Task;
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task');
            $table->string('description');
            $table->boolean('done');
            $table->timestamps();
        });
        
        Task::create([
            'task'=>'weeken-hookup',
            'description'=>'In sed mauris sit amet erat fringilla ultricies. '
            . 'Vestibulum blandit ligula vitae porttitor venenatis. '
            . 'Maecenas ultrices pulvinar mi, eget tincidunt est bibendum in. Quisque a risus ut nisl porttitor tincidunt rutrum in urna. ',
            'done'=>FALSE
        ]);
    
        Task::create([
            'task'=>'to do by me',
            'description'=>'In sed mauris sit amet erat fringilla ultricies. '
            . 'Vestibulum blandit ligula vitae porttitor venenatis. '
            . 'Maecenas ultrices pulvinar mi, eget tincidunt est bibendum in. Quisque a risus ut nisl porttitor tincidunt rutrum in urna. ',
            'done'=>FALSE
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
