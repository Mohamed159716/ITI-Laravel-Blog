<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        // $posts = Post::all();

        $posts = Post::paginate(3);
        return PostResource::collection($posts);
    }

    public function show($postId) {
        $post = Post::find($postId);

        return new PostResource($post);
    }

    public function store(PostRequest $request) {

        $requestData = request()->all();

        $post = Post::create($requestData);

        return new PostResource($post);
    }
}