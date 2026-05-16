@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Edit Category</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('categories.update',$category->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Name</label>

                <input type="text"
                    name="name"
                    value="{{ $category->name }}"
                    class="form-control">

            </div>

            <button class="btn btn-primary">
                Update Category
            </button>

        </form>

    </div>

</div>

@endsection