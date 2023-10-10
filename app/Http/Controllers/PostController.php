<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;

class PostController extends Controller
{
    public function index() {
         if(auth()->user()->userHasRoles('admin')){
        $posts = Post::paginate(5);
        } else {
        $posts = auth()->user()->posts()->paginate(5);
        }
      return view('admin.posts.index', ['posts' => $posts]);
    }
    public function show(Post $post) {

       return view('blog-post', ['post' => $post]);
    }
    public function create() {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }
    public function store() {
      //dd(request()->all());
        $this->authorize('create', Post::class);
        $inputs = request()->validate([
            'title' => 'required|min:5|max:255',
            'post_image' => 'image|mimes:jpg,jpeg,png,webp|max:6000',
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
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }
    public function destroy(Post $post) {
        $post->delete();
        $this->authorize('delete', $post);
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
        $this->authorize('update', $post);
        $post->save();

       // auth()->user()->posts()->save($post);
        Session()->flash('post-update-message', 'Post Updated');
        return redirect()->route('post.index');
    }
}
