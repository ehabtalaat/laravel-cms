<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\categoryrequest;
use Brian2694\Toastr\Facades\Toastr;
class CategoryController extends Controller
{

    public function index()
    {
     $categories = Category::all();
      return view('admin/categories/index')->with('categories',$categories);
      }
    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(categoryrequest $request)
    {
        Category::create([
        'name' => $request->name
        ]);
    Toastr::success('Category added successfully ','Success');
    return redirect()->route("categories.index");
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view("admin/categories/edit")->with("category",$category);
    }


    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name]);
        Toastr::success('Category updated successfully ','Success');
        return redirect()->route("categories.index");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Toastr::success('Category deleted successfully :)','Success');
       return redirect()->route("categories.index");
    }
}
