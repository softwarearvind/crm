@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header">
        <h4>Edit Post</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('posts.update',$post->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Category</label>

                <select name="category_id"
                    class="form-control">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $post->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Title</label>

                <input type="text"
                    name="title"
                    value="{{ $post->title }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Old Image</label><br>

                @if($post->image)

                    <img src="{{ asset('uploads/posts/'.$post->image) }}"
                        width="120"
                        class="img-thumbnail">

                @endif

            </div>

            <div class="mb-3">

                <label>New Image</label>

                <input type="file"
                    name="image"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Description</label>

                <textarea name="description"
                    id="editor"
                    rows="10"
                    class="form-control">{!! $post->description !!}</textarea>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                    class="form-control">

                    <option value="publish"
                        {{ $post->status == 'publish' ? 'selected' : '' }}>

                        Publish

                    </option>

                    <option value="draft"
                        {{ $post->status == 'draft' ? 'selected' : '' }}>

                        Draft

                    </option>

                </select>

            </div>

            <button class="btn btn-primary">
                Update Post
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