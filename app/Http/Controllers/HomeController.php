<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->
        with('userCount',User::all()->count())->
        with('postCount',Post::all()->count())->
        with('trashedCount',Post::onlyTrashed()->get()->count())->
        with('catCount',Category::all()->count());
    }
}
