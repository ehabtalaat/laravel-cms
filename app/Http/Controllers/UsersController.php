<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
class UsersController extends Controller
{
    public function index()
    {
      return view('admin/users/index')->with('users',User::all());
    }

    
    public function create()
    {
      return view('admin/users/create');
    }


    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);
        Profile::create([
            'user_id' => $user->id]);
        Toastr::success('user created successfully ','Success');  
        return redirect()->route('users.index');
    }

   public function makeadmin( $id){
    $user = User::find($id);
    if($user->admin == 1){
        $user->admin = 0;
        $user->save();
    }else{
         $user->admin = 1;
        $user->save();
    }
        return redirect()->route('users.index');
   }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
         Storage::disk('public')->delete($user->profile->avatar);
         Toastr::success('user deleted successfully ','Success');  
         return redirect()->route('users.index');
    }
}
