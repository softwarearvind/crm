<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $imageName = null;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/posts'),
                $imageName
            );
        }

        Post::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success','Post Created Successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::latest()->get();

        return view(
            'admin.posts.edit',
            compact('post','categories')
        );
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $imageName = $post->image;

        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/posts'),
                $imageName
            );
        }

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success','Post Updated Successfully');
    }

    public function destroy(Post $post)
    {
        if($post->image &&
            file_exists(public_path('uploads/posts/'.$post->image)))
        {
            unlink(public_path('uploads/posts/'.$post->image));
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success','Post Deleted Successfully');
    }
}