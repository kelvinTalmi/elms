<?php

namespace App\Http\Controllers;

use Session;
use Hash;

use Illuminate\Http\Request;
use App\models\Admin;
use App\models\Employee;
use App\models\Department;
use App\models\Leavetype;
use App\models\Leavedate;

class AdminController extends Controller
{
    //dashboard
    public function index(){


$data=Leavedate::orderBy('id','desc')->where('status', '0')->get();
 $department=Department::distinct('id')->count('id');
  $employee=Employee::distinct('id')->count('id');
    $leavetype=Leavetype::distinct('id')->count('id');
    $leavedate=Leavedate::where('status','=','0')->count('id');

 $todayDate = date("Y-m-d");
    $onLeave=Leavedate::where('end_date','>',$todayDate)->count('id');



return view('index')->withDepartment($department)->withEmployee($employee)->withLeavetype($leavetype)->withLeavedate($leavedate)->withonLeave($onLeave)->withdata($data) ;

        // return view('index');
    }




public function login(){
        return view('login');
    }

public function submit_login(Request $request){
        $request->validate([
'email'=>'required',
'password'=>'required'  

        ]);

 $userInfo = Admin::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('adminSession', $userInfo->email);
                return redirect('admin');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }


}

}
