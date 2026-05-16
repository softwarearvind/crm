@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Add Post</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('posts.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Category</label>

                <select name="category_id"
                    class="form-control">

                    <option value="">Select Category</option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Title</label>

                <input type="text"
                    name="title"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Image</label>

                <input type="file"
                    name="image"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Description</label>

                <textarea name="description"
                    id="editor"
                    rows="10"
                    class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                    class="form-control">

                    <option value="publish">
                        Publish
                    </option>

                    <option value="draft">
                        Draft
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">
                Save Post
            </button>

        </form>

    </div>

</div>

<script>

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

</script>

@endsection