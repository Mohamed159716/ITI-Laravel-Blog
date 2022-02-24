<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller {


    public function index() {

        // $from = date('Y-m-d');

        // $to = date('2021-05-02');

        // $posts =  Post::whereBetween('created_at', [$from, $to])->get();

        // dd($posts);


        return view('posts.index',  [
            'posts' => Post::paginate(3)
        ]);
    }

    public function create() {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(PostRequest $request) {
        // $request->validate([
        //     'title' => ['required', 'min:3', 'unique:posts'],
        //     'description' => ['required', 'min:10']
        // ]);
        $formData = request()->all();
        $post = Post::create($formData);
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

    public function update($postId, PostRequest $request) {
        $formData = request()->all();
        unset($formData[0]);
        unset($formData[0]);
        Post::find($postId)->update($formData);
        return redirect()->route('posts.index');
    }

    public function destroy($postId) {
        Post::find($postId)->delete();
        return redirect()->route('posts.index');
    }
}