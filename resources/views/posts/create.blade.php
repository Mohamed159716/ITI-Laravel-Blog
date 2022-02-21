@extends('layout.app')

@section('title')
    Create
@endsection

@section('content')

<form class="mt-5" action="{{route('posts.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title address</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" name="description" class="form-label">Description</label>
        <textarea class="form-control" id="exampleInputPassword1" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="user_id" class="form-select">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
</div>

@endsection
