@extends('layouts.app')

@section('content')

<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-white d-flex justify-content-between py-3">

        <h4>Menus</h4>

        <a href="{{ route('menus.create') }}"
            class="btn btn-primary">

            Add Menu

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($menus as $menu)

                <tr>

                    <td>{{ $menu->id }}</td>

                    <td>{{ $menu->name }}</td>

                    <td>{{ $menu->url }}</td>

                    <td>

                        {{ $menu->parent?->name ?? 'Main Menu' }}

                    </td>

                    <td>

                        <span class="badge bg-success">

                            {{ $menu->status }}

                        </span>

                    </td>

                    <td>{{ $menu->sort_order }}</td>

                    <td>

                        <a href="{{ route('menus.edit',$menu->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('menus.destroy',$menu->id) }}"
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