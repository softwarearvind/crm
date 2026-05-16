@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Edit User</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('users.update',$user->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Name</label>

                <input type="text"
                    name="name"
                    value="{{ $user->name }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="email"
                    name="email"
                    value="{{ $user->email }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Password</label>

                <input type="password"
                    name="password"
                    class="form-control">

                <small>Leave blank if no change</small>

            </div>

            <div class="mb-3">

                <label>Role</label>

                <select name="role" class="form-control">

                    @foreach($roles as $role)

                        <option value="{{ $role->name }}"
                            {{ $user->roles->first()?->name == $role->name ? 'selected' : '' }}>

                            {{ $role->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-primary">
                Update User
            </button>

        </form>

    </div>

</div>

@endsection