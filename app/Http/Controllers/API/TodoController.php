<?php

namespace App\Http\Controllers\API;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Todo::all();
        return $task;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $task = Todo::create($request->all());
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoRequest $request)
    {
        // $task = Todo::find($id);
        // $task = Todo::findOrFail($id);

        // If the request reaches here, it means the 'id' parameter is valid
        $task = Todo::findOrFail($request->id);
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest  $request, string $id)
    {
        $task = Todo::findOrFail($id);
        $task->update($request->all());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    public function destroy(TodoRequest $request)
    {
        // $task = Todo::findOrFail($id);
        // return $task->delete();

        // If the request reaches here, it means the 'id' parameter is valid
        $task = Todo::findOrFail($request->id);
        $task->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
