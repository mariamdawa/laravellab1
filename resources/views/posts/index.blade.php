@extends('layouts.app')

@section('title')
    All Posts
@endsection

@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-success" style="margin-left: 70%;margin-bottom:10px"> Create Post</a>

    <table class="table">
        <thead>
        <tr>
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
            <th scope="row">{{ $post['id'] }}</th>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post['posted_by'] }}</td>
            <td>{{ $post['created_at'] }}</td>
            <td>
            <x-buttons.button link="{{  route('posts.show',['post' => $post['id']]) }}" type="success" name="View" />
            <x-buttons.button link="{{  route('posts.edit',['post' => $post['id']]) }}" type="primary" name="Edit" />
            <x-buttons.button link="{{  route('posts.show',['post' => $post['id']]) }}" type="danger" name="Delete" />
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
