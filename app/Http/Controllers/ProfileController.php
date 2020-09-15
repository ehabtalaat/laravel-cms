<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
class ProfileController extends Controller
{
    public function index()
    {
        return view('admin/users/profile')->with('user',auth()->user());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $user = auth()->user();

       if($request->hasfile('avatar')){
         $avatar = $request->avatar;
          $avatarName = time() .'.'. $avatar->getClientOriginalExtension();
         $avatar->storeAs('profile', $avatarName, 'public');
          Storage::disk('public')->delete($user->profile->avatar);
         $user->profile->update([
            'avatar' =>    $avatar->storeAs('profile', $avatarName, 'public')
        ]);
       }
        if($request->has('password')){
        $user->password = Hash::make($request->password);
        $user->save();
    }
        $user->profile->update([
        'youtube' => $request->youtube,
        'facebook' => $request->facebook,
        'about' => $request->about,
        ]);
        $user->email = $request->email;
        $user->name = $request->name;
     Toastr::success('your profile updated successfully ','Success');
   return redirect()->route('users.index');
   }
    public function destroy($id)
    {
        //
    }
}
