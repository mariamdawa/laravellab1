@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    <form method="POST" action="{{route('posts.update',['post'=>$post])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{isset($post['title'])?$post['title']:''}}">
        </div>
        <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" >{{isset($post['description'])?$post['description']:''}} </textarea>
        </div>
        <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select class="form-control" name="user_id" id="post_creator" value="{{isset($post['created_by'])?$post['created_by']:''}}">
        @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        </div>
        <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelp" value="{{isset($post['id'])?$post['id']:''}}" hidden>
        <button type="submit" class="btn btn-success">Save</button>
    </form>

@endsection