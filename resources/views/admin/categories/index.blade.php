@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header d-flex justify-content-between">

        <h4>Categories</h4>

        <a href="{{ route('categories.create') }}"
            class="btn btn-primary">

            Add Category

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
                    <th>Slug</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($categories as $category)

                <tr>

                    <td>{{ $category->id }}</td>

                    <td>{{ $category->name }}</td>

                    <td>{{ $category->slug }}</td>

                    <td>

                        <a href="{{ route('categories.edit',$category->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('categories.destroy',$category->id) }}"
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