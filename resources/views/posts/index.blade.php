@extends('layouts.app')

@section('title')
    All Posts
@endsection

@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-success" style="margin-left: 70%;margin-bottom:10px"> Create Post</a>

    <table class="table" style="margin-left: 50px; margin-right:50px;" >
        <thead >
        <tr >
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row" >{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
            <td>
            <x-buttons.button link="{{  route('posts.show',['post' => $post->id]) }}" type="success" name="View" />
            <x-buttons.button link="{{  route('posts.edit',['post' => $post->id]) }}" type="primary" name="Edit" />
            <button type="button" style="margin-bottom: 20px;" class="btn btn-danger" data-toggle="modal" data-target="#del_post_{{$post->id}}" >Delete</button>
            </td>
        </tr>
        <div id="del_post_{{$post->id}}" class="modal fate" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <form method="POST" action="{{route('posts.destroy', ['post' => $post['id']])}}" accept-charset="UTF-8">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <h4>Are you sure you want to delete this post?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                <input class="btn btn-success" type="submit" value="Yes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
@endsection
