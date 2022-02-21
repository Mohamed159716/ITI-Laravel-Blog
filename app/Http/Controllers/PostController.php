<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller {


    public function index() {
        $posts = Post::all();
        return view('posts.index',  [
            'posts' => Post::paginate(3)
        ]);
    }

    public function create() {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store() {
        $formData = request()->all();
        Post::create($formData);
        return redirect()->route('posts.index');
    }

    public function show($postId) {
        $post = Post::find($postId);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($postId) {
        // Carbon::createFromFormat('Y-m-d H:i:s', '2022-02-21 03:58:03')->format('Y-m-d');
        $users = User::all();
        $post = Post::find($postId);
        return view('posts.edit', [
            'post' => $post, 'users' => $users
        ]);
    }

    public function update($postId) {
        $formData = request()->all();
        array_shift($formData);
        array_shift($formData);
        Post::find($postId)->update($formData);
        return redirect()->route('posts.index');
    }

    public function destroy($postId) {
        Post::find($postId)->delete();
        return redirect()->route('posts.index');
    }
}