<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Holiday::all();
       return view('holidays.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data=Holiday::orderBy('id','desc')->get();
        return view('holidays.create',['departments'=>$data]);
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

        'holiday_name'=>'required|unique:holidays',
        'start_date'=>'required',
        'end_date'=>'required',

    ]);

       $data=new Holiday();
       $data->holiday_name=$request->holiday_name;
       $data->start_date=$request->start_date;
       $data->end_date=$request->end_date;

       $data->save();

    return redirect('holiday/create')->with('msg','Holiday Added Successfully');
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
        $data=Holiday::find($id);
        return view('holidays.edit',['data'=>$data]);
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

        'holiday_name'=>'required|unique:holidays',
        'start_date'=>'required|date',
        'end_date'=>'required|date|after_or_equal:start_date',

    ]);

       $data=Holiday::find($id);
       $data->holiday_name=$request->holiday_name;
       $data->start_date=$request->start_date;
       $data->end_date=$request->end_date;

       $data->save();

    return redirect('holiday/'.$id.'/edit')->with('msg','Holiday Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Holiday::where('id',$id)->delete();

        return redirect('holiday')->with('msg','Holiday Deleted Successfully');
    }
}
