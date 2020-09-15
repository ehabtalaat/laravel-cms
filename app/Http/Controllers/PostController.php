<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\postrequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        return view('admin/posts/index')->with('posts',$posts);
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() > 0){
        return view('admin/posts/create')->with('categories',$categories)->with('tags',$tags);
    }
    else{
         return redirect()->route('home');
    }
    }
    public function store(postrequest $request)
    {
         $image = $request->image;
          $imageName = time().'.'.$image->getClientOriginalExtension();
         $image->storeAs('posts', $imageName, 'public');
        $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'slug' => Str::slug($request->title, '-'),
         'user_id' => auth()->id(),
        'image' => $image->storeAs('posts', $imageName, 'public')
        ]);
          if($request->tags){
     $post->tags()->attach($request->tags);
        }
        Toastr::success('Post added successfully ','Success');
           return redirect()->route("posts.index");
    }

    public function show(Post $post)
    {
        //
    }
    public function edit(Post $post)
    {
        return view('admin/posts/edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    public function update(postrequest $request, Post $post)
    {
       
       if($request->hasfile('image')){
         $image = $request->image;
          $imageName = time() .'.'. $image->getClientOriginalExtension();
         $image->storeAs('posts', $imageName, 'public');
          Storage::disk('public')->delete($post->image);
         $post->update([
            'image' =>    $image->storeAs('posts', $imageName, 'public')
        ]);
       }
   
        $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'slug' => Str::slug($request->title, '-'),
        ]);
         if($post->tags){
            $post->tags()->sync($request->tags);
        }
     Toastr::success('Post updated successfully ','Success');
    return redirect()->route("posts.index");
    }
    public function trashedPosts(){
      $posts =  Post::onlyTrashed()->get();
       Toastr::success('Post trashed successfully ','Success');
       return view('admin/posts/trashedPosts')->with('posts',$posts);
    }
    public function restore($id){
     post::withTrashed()->find($id)->restore();
    Toastr::success('Post restored successfully ','Success');
     return redirect()->route("posts.index");
    }
    public function destroy(Post $post)
    {
    $post->delete();
        return redirect()->route("posts.index");
    }
   public function delete($id){
     $post = post::withTrashed()->where('id',$id)->first();
    if($post->trashed()){
    Storage::disk('public')->delete($post->image);
    $post->forceDelete();
}
   Toastr::success('Post deleted successfully ','Success');
     return redirect()->route("posts.index");
   }
}
