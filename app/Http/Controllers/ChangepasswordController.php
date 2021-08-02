<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Admin;

use Auth, Hash,Session;


class ChangepasswordController extends Controller
{
    public function index()
    {

      return view('changepassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);
$val=Session::get('adminSession');


 $userInfo = Admin::where('email','=', $val)->first();



   if(!Hash::check($request->current_password, $userInfo->password)){
  
     
            return back()->with('error', 'Current password does not matchUser');

          }else{

             $userInfo->password = Hash::make($request->password);
        $userInfo->save();

             return back()->with('error', 'Password Changed Successfully');
          }


    }


}