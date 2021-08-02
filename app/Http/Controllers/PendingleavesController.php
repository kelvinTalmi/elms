<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Leavedate;
use App\Models\Leavetype;

class PendingleavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Leavedate::orderBy('id','desc')->where('status', '0')->get();
        return view('leavedates.pendingleaves',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $approve=Leavedate::orderBy('id','desc')->get();
        $data=Leavedate::find($id);
        return view('leavedates.edit',['pending'=>$approve,'data'=>$data]);
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
            'comment'=>'required'
        ]);


       if($request->has('approve')){
        $data=Leavedate::find($id);
       $data->comment=$request->comment;
        $data->status=1;

       $data->save();

        return redirect('pending')->with('msg','Leave Approved Successfully');
    }else{

 $data=Leavedate::find($id);
       $data->comment=$request->comment;
        $data->status=2;

       $data->save();

            return redirect('pending')->with('msg','Leave Declined Successfully');


    }




}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
