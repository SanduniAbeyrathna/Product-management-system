<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;
use domain\Facades\TodoFacade;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TodoController extends ParentController
{
    public function index()
    {
        $response ['tasks'] = TodoFacade::all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
        // Role::create(['name' => 'Admin']);
        // Role::create(['name' => 'Sub Admin']);

        // Role::create(['name' => 'Manager']);
        // Role::create(['name' => 'User']);

        // Permission::create(['name' => 'view_todo']);
        // Permission::create(['name' => 'create_todo']);
        // Permission::create(['name' => 'update_todo']);
        // Permission::create(['name' => 'delete_todo']);
        // Permission::create(['name' => 'done_todo']);

        // TodoFacade::store($request->all());
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['task'] = TodoFacade::get($request['task_id']);
        return view('pages.todo.edit')->with($response);
    }

    public function update(Request $request, $task_id)
    {
        TodoFacade::update($request->all(), $task_id);
        return redirect()->back();
    }

    public function delete($task_id)
    {
        // dd($task_id);

        // Find the task by task_id
        TodoFacade::delete($task_id);
        return redirect()->back();
    }

    public function status($task_id)
    {
        TodoFacade::status($task_id);
        return redirect()->back();
    }

    public function subTask($task_id)
    {
        $response['task'] = TodoFacade::get($task_id);
        $response['sub_tasks'] = TodoFacade::getSubTaskByTask($task_id);
        return view('pages.todo.subtask')->with($response);
    }

    // sub task section
    public function subTaskStore(Request $request)
    {
        // dd($request);
        TodoFacade::subTaskStore($request->all());
        return redirect()->back();
    }
}
