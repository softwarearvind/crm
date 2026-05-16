@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header d-flex justify-content-between">

        <h4>Users</h4>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            Add User
        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                <tr>

                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        {{ $user->roles->first()?->name }}
                    </td>

                    <td>

                        <a href="{{ route('users.edit',$user->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('users.destroy',$user->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection