@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">

            <h4 class="mb-0">
                Roles Management
            </h4>

            @can('role-create')

            <a href="{{ route('roles.create') }}"
                class="btn btn-primary rounded-3">

                <i class="bi bi-plus-circle"></i>

                Add Role

            </a>

            @endcan

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="80">ID</th>

                            <th>Role Name</th>

                            <th>Permissions</th>

                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($roles as $role)

                        <tr>

                            <td>
                                {{ $role->id }}
                            </td>

                            <td>

                                <span class="badge bg-primary fs-6">

                                    {{ ucfirst($role->name) }}

                                </span>

                            </td>

                            <td>

                                @foreach($role->permissions as $permission)

                                    <span class="badge bg-dark mb-1">

                                        {{ $permission->name }}

                                    </span>

                                @endforeach

                            </td>

                            <td>

                                @can('role-edit')

                                <a href="{{ route('roles.edit',$role->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                @endcan


                                @can('role-delete')

                                <form action="{{ route('roles.destroy',$role->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this role ?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                                @endcan

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted py-4">

                                No Roles Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection