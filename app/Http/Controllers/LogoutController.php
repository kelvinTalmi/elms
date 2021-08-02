<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function logout(){
	Session::forget('adminSession');
    	return redirect('admin/login');
    }
}
