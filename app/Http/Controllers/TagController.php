<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\tagrequest;
use Brian2694\Toastr\Facades\Toastr;
class TagController extends Controller
{
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin/tags/index')->with('tags',$tags);
    } 
    public function create()
    {
     return view('admin/tags/create');
    }
    public function store(tagrequest $request)
    {
         Tag::create([
        'tag' => $request->tag
        ]);
    Toastr::success('tag created successfully ','Success');   
    return redirect()->route("tags.index");
    }
    public function show(Tag $tag)
    {
        //
    }

  
    public function edit(Tag $tag)
    {
        return view("admin/tags/edit")->with("tag",$tag);
    }

    public function update(tagrequest $request, Tag $tag)
    {
          $tag->update([
            'tag' => $request->tag
        ]);
       Toastr::success('tag update successfully ','Success');
        return redirect()->route("tags.index");
    }

    public function destroy(Tag $tag)
    {
     $tag->delete();
     Toastr::success('tag deleted successfully ','Success');
       return redirect()->route("tags.index");
    }
}
