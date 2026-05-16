@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Add Category</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('categories.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label>Name</label>

                <input type="text"
                    name="name"
                    class="form-control">

                @error('name')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                @enderror

            </div>

            <button class="btn btn-primary">
                Save Category
            </button>

        </form>

    </div>

</div>

@endsection