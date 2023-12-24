@extends('layouts.app')

@section('content')
    <div class="card p-3">

        <div class="card-header">
            <h3>Add New Permissions</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('permissions.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <input type="text" class="form-control" name="permission" id="permission"
                                placeholder="Permission Name" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success mt-3">Save</button>
            </form>

            <ul class="mt-3">
                @foreach ($permissions as $permission)
                    <li>
                        {{ $permission->name }}
                    </li>
                @endforeach
            </ul>

        </div>

    </div>
@endsection
