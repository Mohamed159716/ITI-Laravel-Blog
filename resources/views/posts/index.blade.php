@extends('layout.app')
@section('title')Posts @endsection
@section('content')
<div class="text-center mt-4">
    <a href="{{route("posts.create")}}" class="btn btn-success">Create</a>
</div>
<table class="table mt-1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post['id']}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</td>
            <td class="text-center">
                <a href="{{route('posts.show', ['postId' => $post->id])}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit', ['postId' => $post->id])}}" class="btn btn-primary">Edit</a>
                <form class="d-inline" action="{{route('posts.destroy', ['postId' => $post->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this post?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- <div class="d-flex justify-content-center">
  {!! $posts->links() !!}
</div> --}}
<div>
      {!!$posts->links()!!}
</div>
@endsection
