@extends('layout.app')
@section('title')
Show
@endsection

@section('content')
<div class="card mt-5">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <p class="card-text"><span class="fw-bold">Title </span> {{$post->title}}</p>
        <p class="card-text"><span class="fw-bold">Description </span> {{$post->description}}</p>
    </div>
</div>

<div class="card mt-5">
    <h5 class="card-header">Post Creator Info</h5>
    <div class="card-body">
        <p class="card-text"><span class="fw-bold">Name </span> {{$post->user->name}}</p>
        <p class="card-text"><span class="fw-bold">CreatedAt </span> {{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</p>
    </div>
</div>

@endsection
