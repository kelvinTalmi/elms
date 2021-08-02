<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavetype;

class LeavetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Leavetype::orderBy('id','desc')->get();
        return view('leavetype.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leavetype.create');
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
            'name'=>'required|unique:leavetypes',
            'duration'=>'required',

        ]);

        $data=new Leavetype();
        $data->leave_name=$request->name;
        $data->duration=$request->duration;
        $data->save();

        return redirect('leavetype/create')->with('msg','Leave Type has been submitted');
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
      $data=Leavetype::find($id);
        return view('leavetype.edit',['data'=>$data]);
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
            'name'=>'required',
            'duration'=>'required',
        ]);

        $data=Leavetype::find($id);
        $data->leave_name=$request->name;
        $data->duration=$request->duration;
        $data->save();

        return redirect('leavetype/'.$id.'/edit')->with('msg','Leave updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leavetype::where('id',$id)->delete();
        return redirect('leavetype');
    }
}
