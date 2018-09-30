<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;


class PostController extends Controller
{

	public function __construct(){
		$this->middleware('auth')->except(['index','view']); //control authenticaion
	}

    public function index()
    {
    	//$posts=Post::all(); show all
    	$posts=Post::orderBy('id','desc')->paginate(4); //including descending with pagination
    	return view('posts/index',[
    			'posts'=>$posts
    		]);
    }

    public function view($id)
    {
    	$post=Post::find($id);
    	return view('posts/view',[
    			'post'=>$post
    		]);
    }

    public function add()
    {
    	$categories=Category::all();
    	
    	return view('posts/add',[
    		'categories'=>$categories
    	]);
    }

    public function create()
    {

    	//validation algorithm
    	$validator=validator(request()->all(),[
    		'title'=>'required',
    		'body'=>'required'	
    	]);

    	if($validator->fails()){
    		return redirect('posts/add')->withErrors($validator); //return error message
    	}

    	$post=new Post();
    	$post->title=request()->title;
    	$post->body=request()->body;
    	$post->category_id=request()->category_id;
    	$post->save();

    	return redirect('posts');
    }

    public function edit($id){
    	$post=Post::find($id);
    	$categories=Category::all();

    	return view('posts/edit',[
    		'post'=>$post,
    		'categories'=>$categories
    	]);
    }

    public function update($id)
    {
    	$post=Post::find($id);
    	$post->title=request()->title;
    	$post->body=request()->body;
    	$post->category_id=request()->category_id;
    	$post->save();

    	return redirect('posts/view/'.$id);
    }

    public function delete($id){
    	$post=Post::find($id);
    	$post->delete();

    	return redirect('posts')->with('info','A post deleted'); //for flash message
    }

    public function addComment(){
    	$comment=new Comment();

    	$comment->comment=request()->comment;
    	$comment->post_id=request()->post_id;
    	$comment->save();

    	return back();
    }
}
