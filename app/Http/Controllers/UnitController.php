<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $units = Unit::where('course_id',1)->pluck('name');
         $units = Unit::all();
         $numberOfUnits = Unit::whereMonth('created_at',date('m'))->count();
         $maxId = Unit::whereYear('created_at',date('Y',strtotime('+1 year')))->max('id');
         $minId = Unit::min('id');
         $average = Unit::avg('id');
         $total= Unit::whereYear('created_at', date('Y',strtotime('-1 year')))->sum('id');
        return view('unit.index',compact('units','numberOfUnits','maxId','minId','average','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        return view('unit.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit =new Unit();
        $unit->name = $request->name;
        $unit->course_id = $request->course_id;
        $unit->syllabus_id=$request->syllabus_id;
        $unit->duration=$request->duration;
        $unit->desc=$request->description;
        $unit->user_id=Auth::user()->id;
        $unit->save();

        Toastr::info('Unit created Successfuly','Success');
        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return view('unit.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $courses = Course::all();
        return view('unit.edit',compact('courses','unit'));
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
        $unit =Unit::findOrFail($id);
        $unit->name = $request->name;
        $unit->course_id = $request->course_id;
        $unit->syllabus_id=$request->syllabus_id;
        $unit->duration=$request->duration;
        $unit->desc=$request->description;
        $unit->save();

        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->back();

    }

    public function queryBuilding()
    {
        // SELECT `name`, `email` FROM `users` 
        // $unit = Unit::where('course_id',1)->latest()->value('name')->first();
        $units  = Unit::all();
        return view('unit.index',compact('units'));
    }
}
