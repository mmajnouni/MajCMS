<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post) {

       return view('blog-post', ['post' => $post]);
    }
    public function create() {

        return view('admin.posts.create');
    }
    public function store() {
        //dd(request()->all());
        $inputs = request()->validate([
            'user_id' => auth()->user()->id,
            'title' => 'required|min:5|max:255',
            'post_image' => 'file',
            'body'=> 'required'
        ]);
        if (request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        Post::create($inputs);

        return back();
    }
}
