@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Add Sub Task</h1>
                <h5 class="page-task-main">{{ $task->task }} | {{ $task->updated_at->format('Y-m-d') }}</h5>
            </div>
            <div class="col-lg-11 mt-5"> {{-- max length: col-lg-12 --}}
                <form action="{{ route('todo.subtask.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <a href="{{ route('todo.index') }}" type="button" class="btn btn-secondary btn-sm">Back</a>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Add New Sub Task</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            {{-- 1st row --}}
                                            <div class="row">
                                                <div class="col-lg-2 text-end mt-1">
                                                    <label>Add Sub Task:</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name='sub_title'
                                                            maxlength="20" id="sub_title" placeholder="Add Sub Task"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 text-end mt-1">
                                                    <label>Add Phone:</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" name='phone'
                                                            maxlength="10"
                                                            oninput="javascript: if(this.value.length > this.maxLength) this.value=this.value.slice(0, this.maxLength)"
                                                            id="phone" placeholder="Add Phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end of the 1st row --}}
                                            {{-- 2nd row --}}
                                            <div class="row mt-3">
                                                {{-- drop-down --}}
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <select name="priority" id="priority" class="form-control"
                                                            required>
                                                            <option>Select Priority</option>
                                                            <option value="1">Priority 1</option>
                                                            <option value="2">Priority 2</option>
                                                            <option value="3">Priority 3</option>
                                                            <option value="4">Priority 4</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <textarea name="note" id="note" rows="2" cols="30" placeholder="Add Note" required='required'
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input class="form-control" type="date" name='date'
                                                            id="date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end of the 2nd row --}}
                                        </div>
                                        <div class="col-lg-12 mt-3 text-center">
                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub Title</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Note</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_tasks as $key => $sub_task)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $sub_task->sub_title }}</td>
                                <td>{{ $sub_task->phone }}</td>
                                <td>{{ $sub_task->priority }}</td>
                                <td>{{ $sub_task->note }}</td>
                                <td>{{ $sub_task->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            margin-top: 3vh;
            font-size: 2rem;
            color: rgb(0, 130, 111);
        }

        .btn {
            /*add a space between two icons */
            margin-left: 20px;
        }

        .page-task-main {
            font-size: 1rem;
            color: rgb(42, 165, 63)
        }
    </style>
@endpush
