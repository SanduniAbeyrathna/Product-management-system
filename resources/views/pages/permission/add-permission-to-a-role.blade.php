@extends('layouts.app')

@section('content')
    <div class="card p-3">

        <div class="card-header">
            <h3>ASSIGN PERMISSIONS TO A ROLE</h3>
        </div>

        <form action="{{ route('roles.store') }}" method="post">

            @csrf

            <div class="row mt-3">
                <div class="col-md-3">
                    <h4>Roles</h4>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <h4>Permissions</h4>
                    @foreach ($permissions as $permission)
                        <input type="checkbox" name="permissions[]" id="permissions" value="{{ $permission->id }}">
                        {{ ucwords($permission->name) }} <br>
                    @endforeach
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <button class="btn btn-info">SAVE</button>
                </div>
            </div>

        </form>

    </div>
@endsection
