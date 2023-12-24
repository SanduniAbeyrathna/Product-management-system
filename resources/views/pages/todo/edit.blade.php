
<form action="{{ route('todo.update', $task->id) }}" method="post">
    @csrf
    <div class="row">
        {{-- <div class="col-lg-2 mt-2">
            <label for="">Update Your Task : </label>
        </div> --}}
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" type="text" name='task' value="{{ $task->task }}" id="task"
                    placeholder="Add Task" required>
            </div>
        </div>
        <div class="col-lg-4 mt-1">
            <button type="submit" class="btn btn-success btn-sm">UPDATE</button>
        </div>
    </div>
</form>
