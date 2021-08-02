<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
class EmployeeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Employee::orderBy('id','desc')->get();
        return view('employee.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Department::orderBy('id','desc')->get();
        return view('employee.create',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
'depart'=>'required',
'position'=>'required',
'idNo'=>'required',
        'full_name'=>'required',
        'email'=>'required|email|unique:employees',
        'phone_number'=>'required|digits:10',
        'photo'=>'required|image|mimes:jpg,png,gif',

    ]);


  $photo=$request->file('photo');
        $renamePhoto1=time().'.'.$photo->getClientOriginalExtension();
$renamePhoto=time().$photo->getClientOriginalName();



        $dest=public_path('/images/');
        

        $dest=public_path('/images');
        $photo->move($dest,$renamePhoto);
        



     


       $data=new Employee();
        $data->department_id=$request->depart;
       $data->full_name=$request->full_name;
       $data->photo=$renamePhoto;
       $data->email=$request->email;
       $data->phone_number=$request->phone_number;
       $data->position=$request->position;
       $data->idNo=$request->idNo;

       $data->save();

    return redirect('depart/create')->with('msg','Data has been submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=employee::find($id);
        return view('employee.show',['data'=>$data]);
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departs=Department::orderBy('id','desc')->get();
        $data=Employee::find($id);
        return view('employee.edit',['departs'=>$departs,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'depart'=>'required',
'position'=>'required',
'idNo'=>'required',
        'full_name'=>'required',
        'email'=>'required|email',
        'phone_number'=>'required|digits:10',
   
        ]);


        if($request->hasFile('photo')){
            $photo=$request->file('photo');
            $renamePhoto=time().'.'.$photo->getClientOriginalExtension();
            $dest=public_path('/images');
            $photo->move($dest,$renamePhoto);
        }else{
            $renamePhoto=$request->prev_photo;
        }

        $data=Employee::find($id);
        $data->department_id=$request->depart;
        $data->full_name=$request->full_name;
        $data->photo=$renamePhoto;
         $data->email=$request->email;
       $data->phone_number=$request->phone_number;
       $data->position=$request->position;
       $data->idNo=$request->idNo;
        $data->save();

        return redirect('employee/'.$id.'/edit')->with('msg','Data has been submitted');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();

        return redirect('employee')->with('msg','Employee Deleted Successfully');
    }
}
