<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
    * Write code on Method
    *
    * @return response()
    * 
    * 
    * 
    */

      public function index()
    {
        $data=Admin::orderBy('id','desc')->get();
        return view('settings',['data'=>$data]);
    }


    public function edit($id)
    {
        $users = admin::find(Auth::user()->id);
        return view('settings',compact('users'));
    }
    
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
 
        $hashedPassword = Auth::user()->password;
        if (\Hash::check($request->oldpassword , $hashedPassword)) {
            if (\Hash::check($request->newpassword , $hashedPassword)) {
 
                $users = admin::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                $users->save();

                session()->flash('message','password updated successfully');
                return redirect()->back();
            }
            else{
                session()->flash('message','new password can not be the old password!');
                return redirect()->back();
            } 
        }
        else{
            session()->flash('message','old password doesnt matched');
            return redirect()->back();
        }
    }
}