<?php

namespace domain\Services;

use App\Models\Todo;
use App\Models\SubTask;

class TodoService
{
    protected $task;
    protected $subtask;

    public function __construct()
    {
        $this->task = new Todo();
        $this->subtask = new SubTask();
    }

    public function get($task_id)
    {
        return $this->task->find($task_id);
    }

    //get all tasks
    public function all()
    {
        return $this->task->all();
    }

    public function store($data)
    {
        // dd($request);
        $this->task->create($data);
    }

    public function update(array $data, $task_id)
    {
        $task = $this->task->find($task_id);
        $task->update($this->edit($task, $data));
    }

    protected function edit(Todo $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }

    public function delete($task_id)
    {
        // Find the task by task_id
        $task = $this->task->find($task_id);
        $task->delete();
    }

    public function status($task_id)
    {
        $task = $this->task->find($task_id);
        if ($task->status == 1) {
            $task->status = 0;
            $task->update();
        } elseif ($task->status == 0) {
            $task->status = 1;
            $task->update();
        }

        //this is used for change not complete > complete only
        // $task->status = 1;
        // $task->update();
    }

    // sub task section
    public function subTaskStore($data)
    {
        $this->subtask->create($data);
    }

    public function getSubTaskByTask($task_id)
    {
        return $this->subtask->getSubTaskByTask($task_id);
    }
}
