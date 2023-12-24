@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Todo List</h1>
            </div>
            <div class="col-lg-11 mt-5"> {{-- max length: col-lg-12 --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('todo.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 mt-2">
                            <label for="">Enter Your Task : </label>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name='task' id="task"
                                    placeholder="Add Task" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-dark btn-sm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-info table-bordered border-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Completed Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $task->task }}</td>
                                <td>
                                    @if ($task->status == 0)
                                        <span class="badge rounded-pill bg-warning">Not Completed</span>
                                    @else
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>{{ $task->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $task->updated_at->format('Y-m-d H:i:s') }}</td>
                                <td class="d-flex align-items-center">
                                    {{-- <form action="{{ route('todo.delete', $task->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this task?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form> --}}
                                    <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash-alt"></i></a>
                                    <a href="{{ route('todo.status', $task->id) }}" class="btn btn-success btn-sm"><i
                                            class="fa-regular fa-circle-check"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i
                                            class="fa-solid fa-pencil" onclick="taskEditModal({{ $task->id }})"
                                            data-bs-toggle="modal" data-bs-target="#taskEdit"></i></a>
                                    <a href="{{ route('todo.subtask', $task->id) }}" class="btn btn-dark btn-sm"><i
                                            class="fa fa-arrow-right"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="taskEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskEditLabel">Update Your Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="taskEditContent">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            margin-top: 10vh;
            font-size: 2rem;
            color: rgb(0, 130, 111);
        }

        .btn {
            /*add a space between two icons */
            margin-left: 5px;
        }
    </style>
@endpush

{{-- task Editing Modal Function --}}
@push('js')
    <script>
        function taskEditModal(task_id) {
            var data = {
                task_id: task_id,
            };
            $.ajax({
                type: "GET",
                url: "{{ route('todo.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                dataType: '',
                success: function(response) {
                    $('#taskEdit').modal('show');
                    $('#taskEditContent').html(response);
                }
            });
        }
    </script>
@endpush
