<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;
use App\Post;
use App\Tag;
class FrontController extends Controller
{
    public function index(){
    	return view('welcome')->
    	with('categories',Category::take(5)->get())->
    	with('title',Setting::first()->site_name)->
    	with('firstPost',Post::orderBy('created_at','desc')->first())->
    	 with('secondPost',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())->
    	with('thirdPost',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())->
        with('all',Category::all())->
        with('setting',Setting::first());
    }
    public function  singlePost($slug){
    	$post = Post::where('slug',$slug)->first();
    	$prepost = Post::where('id' ,'<' ,$post->id)->max('id');
    	$nextpost = Post::where('id', '>',$post->id)->min('id');
    	return view('singlepost')->with('categories',Category::take(5)->get())->
    	with('title',Setting::first()->site_name)->
    	with('setting',Setting::first())->
    	with('post',$post)->
    	with('tags',Tag::all())
    	->with('next',Post::find($nextpost))->
    	with('prev',Post::find($prepost));
    }
    public function category($id){
    	//$category = Category::where('id',$id)->get();
    	return view('category')->with('cat',Category::take(5)->get())->
    	with('title',Setting::first()->site_name)->
    	with('setting',Setting::first())->
    	with('tags',Tag::all())->
    	with('category',Category::where('id',$id)->first());
    }
      public function tag($id){
    	$taging = Tag::find($id)->first();
    	return view('tag')->with('categories',Category::take(5)->get())->
    	with('title',Setting::first()->site_name)->
    	with('setting',Setting::first())->
    	with('tags',Tag::all())->
    	with('taging',$taging);
    }
}
