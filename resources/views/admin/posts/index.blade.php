@extends('layouts.app')

@section('content')

<div class="card shadow border-0">

    <div class="card-header d-flex justify-content-between">

        <h4>Posts</h4>

        <a href="{{ route('posts.create') }}"
            class="btn btn-primary">

            Add Post

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
                    <th>Image</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($posts as $post)

                <tr>

                    <td>{{ $post->id }}</td>

                    <td>

                        @if($post->image)

                        <img src="{{ asset('uploads/posts/'.$post->image) }}"
                            width="70">

                        @endif

                    </td>

                    <td>
                        {{ $post->category?->name }}
                    </td>

                    <td>{{ $post->title }}</td>

                    <td>{{ $post->status }}</td>

                    <td>

                        <a href="{{ route('posts.edit',$post->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('posts.destroy',$post->id) }}"
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