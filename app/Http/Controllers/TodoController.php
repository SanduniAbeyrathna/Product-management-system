<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use domain\Facades\TodoFacade;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class TodoController extends ParentController
{
    public function __construct()
    {
        // $this->middleware(['auth', 'role:Admin']);
        // $this->middleware(['auth', 'can:view_todo']);
        // $this->middleware(['auth', 'permission:view_todo']);
        // $this->middleware(['role_or_permission:Admin|todo_edit']);
    }

    public function index()
    {
        $user = Auth::user();
        // dd($user);
        // dd($user->getRoleName());
        // dd($user->getPermissionNames());
        // dd($user->getPermissionsViaRoles());

        $response ['tasks'] = TodoFacade::all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
        //Create Roles
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'sub_admin']);
        // Role::create(['name' => 'company']);
        // Role::create(['name' => 'user']);
        // Role::create(['name' => 'super_admin']);

        //Create Permissions
        // Permission::create(['name' => 'view_todo']);
        // Permission::create(['name' => 'create_todo']);
        // Permission::create(['name' => 'todo_edit']);
        // Permission::create(['name' => 'todo_delete']);
        // Permission::create(['name' => 'done_todo']);

        //Assign Roles to user
        $admin = User::find(3);
        $company = User::find(4);
        $user = User::find(5);
        $super_admin = User::find(2);

        $admin->assignRole('Admin');
        $company->assignRole('Company');
        $user->assignRole('User');
        $super_admin->assignRole('Super Admin');

        //Give permission to role
        $role_admin = Role::where('name', 'Admin')->first();
        $role_company = Role::where('name', 'Company')->first();
        $role_user = Role::where('name', 'User')->first();

        $role_admin->givePermission('todo_view');
        $role_admin->givePermission('todo_create');
        $role_admin->givePermission('todo_edit');
        $role_admin->givePermission('todo_delete');

        $role_company->givePermission('todo_view');
        $role_company->givePermission('todo_create');
        $role_company->givePermission('todo_edit');

        $role_user->givePermission('todo_view');

        //Get the user
        // $user = Auth::user();

        // Role check
        // if ($user->hasRole('Admin')) {
        //     TodoFacade::store($request->all());
        //     return redirect()->back();
        // }else {
        //     dd(`You don't have permission to access this page`);
        // }

        //Permission Check
        // if ($user->hasPermissionTo('todo_create')) {
        //     TodoFacade::store($request->all());
        //     return redirect()->back();
        // }else {
        //     dd(`You don't have permission to access this page`);
        // }

        //super_admin
        // if ($user->can('todo_create')) {
        //     TodoFacade::store($request->all());
        //     return redirect()->back();
        // }else {
        //     dd(`You don't have permission to access this page`);
        // }

            TodoFacade::store($request->all());
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