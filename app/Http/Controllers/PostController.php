<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $_allPosts=[
        ['id' => 1, 'title' => 'Learn Php', 'posted_by' => 'Ahmed', 'created_at' => '2018-04-10','description'=>'With supporting text below as a natural lead-in additional context.','email'=>'ahmed@gmail.com'],
        ['id' => 2, 'title' => 'Solid Principles', 'posted_by' => 'Mohamed', 'created_at' => '2018-04-12','description'=>'With supporting text below as a natural lead-in additional context.','email'=>'mohamed@gmail.com'],
        ['id' => 3, 'title' => 'Design Patters', 'posted_by' => 'Ali', 'created_at' => '2018-04-12','description'=>'With supporting text below as a natural lead-in additional context.','email'=>'sli@gmail.com'],
    ];
    function index(){
        
        return view('posts.index',['posts'=>$this->_allPosts]);
    }

    function show($postID){
        $indexOfPost=array_search($postID, array_column($this->_allPosts, 'id'));
        return view('posts.show',['post'=>$this->_allPosts[$indexOfPost]]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function edit($postID)
    {
        $indexOfPost=array_search($postID, array_column($this->_allPosts, 'id'));
        return view('posts.edit',['post'=>$this->_allPosts[$indexOfPost]]);
    }
    public function store()
    {

        return redirect()->route('posts.index');
    }



}
