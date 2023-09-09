<?php

namespace App\Http\Controllers;

use App\Models\Post;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }
    public function show(Post $post) {

       return view('blog-post', ['post' => $post]);
    }
    public function create() {

        return view('admin.posts.create');
    }
    public function store() {
        //dd(request()->all()); 
        $inputs = request()->validate([
            
            'title' => 'required|min:5|max:255',
            'post_image' => 'file',
            'body'=> 'required'
        ]);
        if (request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);
        session()->flash('post-create-message','Post' . $inputs['title'] . 'Created');

        return redirect()->route('post.index');
    }
    
    public function edit(Post $post) {
    
        return view('admin.posts.edit', ['post' => $post]);
    }
    public function destroy(Post $post) {
        $post->delete();
        Session()->flash('message', 'Post Deleted');
        return back();
    }

    public function update(Post $post) {
        $inputs = request()->validate([
            'title' => 'required|min:5|max:255',
            'post_image' => 'file',
            'body'=> 'required'
        ]);
        if (request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $post->save();
       // auth()->user()->posts()->save($post);
        Session()->flash('post-update-message', 'Post Updated');
        return redirect()->route('post.index');
    }
}
