@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Create Role</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('roles.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label>Role Name</label>

                <input type="text"
                    name="name"
                    class="form-control">

            </div>

            <div class="row">

                @foreach($permissions as $permission)

                    <div class="col-md-3 mb-3">

                        <div class="form-check">

                            <input type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                class="form-check-input">

                            <label class="form-check-label">

                                {{ $permission->name }}

                            </label>

                        </div>

                    </div>

                @endforeach

            </div>

            <button class="btn btn-primary">

                Save Role

            </button>

        </form>

    </div>

</div>

@endsection