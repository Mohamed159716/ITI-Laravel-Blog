@extends('layout.app')
@section('title')
Edit
@endsection
@section('content')
<form class="mt-5" method="POST" action="{{route('posts.update', ['postId' => $post->id])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title address</label>
        <input type="text" value="{{$post->title}}" name="title" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" name="description" class="form-label">Description</label>
        <textarea class="form-control" id="exampleInputPassword1">{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="post_creator" class="form-select">
            @foreach($users as $user)
            <option value="{{$user->id}}" {{$user->id == $post->user->id ? "selected" : ""}}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
</div>
@endsection
