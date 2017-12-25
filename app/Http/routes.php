<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $taskModel = new App\Task();
    $tasks = $taskModel->paginate(4);
    return View::make('crud')->with('tasks',$tasks);
});

Route::put('/task/{taskid?}',function(\Illuminate\Http\Request $request,$taskid){
    $taskModel = new App\Task();
    $task = $taskModel->find($taskid);
    $task->task = $request->task;
    $task->description = $request->description;
    $task->save();
    return Response::json($task);
});

Route::get('/task/{taskid?}',function($taskid){
    $taskModel = new App\Task();
    $task=$taskModel->find($taskid);
    return Response::json($task);
});

Route::post('/task',function(\Illuminate\Http\Request  $request){
    $taskmodel = new App\Task();
    $task=$taskmodel->create($request->all());
    return Response::json($task);
});

Route::delete('/task/{taskid}',function($taskid){
    $taskmodel = new App\Task();
    $taskmodel->destroy($taskid);
    return Response::json(['success'=>'1']);
});