<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    
    function index(){
        $allPosts=Post::all();
        return view('posts.index',['posts'=>$allPosts]);
    }

    function show($postID){
        $post=Post::find($postID);
        $user=User::find($post->id);
        return view('posts.show',['post'=>$post,'user'=>$user]);
    }
    public function create()
    {
        return view('posts.create',['users'=>User::all()]);
    }

    public function edit($postID)
    {
        $post=Post::find($postID);
        return view('posts.edit',['post'=>$post,'users'=>User::all()]);
    }
    public function store(StorePostRequest $request)
    {
       
        $requestData = $request->all();
        Post::create($requestData);
        return redirect()->route('posts.index');
    }
    public function update(Post $post, StorePostRequest $request){
        $requestData = $request->all();
        $post=Post::find($requestData['id']);
        $post->description=$requestData['description'];
        $post->title=$requestData['title'];
        $post->user_id=$requestData['user_id'];
        $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }



}
