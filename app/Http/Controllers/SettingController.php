<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class SettingController extends Controller
{
    
    public function index()
    {
        return view('admin/settings/index')->with('setting',Setting::first());
    }

   
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

 
    public function show(Setting $setting)
    {
        //
    }

    
    public function edit(Setting $setting)
    {
        //
    }

 
    public function update(Request $request, Setting $setting)
    {
        $setting->update([
         'site_name' => $request->site_name,
         'contact_number' => $request->contact_number,
         'contact_email' => $request->contact_email,
         'address' => $request->address
        ]);
         Toastr::success('th setting of the blog was updated successfully','Success');
        return redirect()->route('home');
    }

    public function destroy(Setting $setting)
    {
        //
    }
}
