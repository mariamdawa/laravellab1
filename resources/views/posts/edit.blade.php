@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{isset($post['title'])?$post['title']:''}}">
        </div>
        <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" >{{isset($post['description'])?$post['description']:''}} </textarea>
        </div>
        <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select class="form-control" id="post_creator" value="{{isset($post['created_by'])?$post['created_by']:''}}">
            <option>Ahmed</option>
        </select>
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>

@endsection