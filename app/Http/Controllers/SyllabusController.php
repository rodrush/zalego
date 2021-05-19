<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabi = Syllabus::all();
        return view('syllabus.index',compact('syllabi'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view('syllabus.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $syllabus =new Syllabus();
        $syllabus->unit_id = $request->unit_id;
        $syllabus->desc=$request->description;
        $syllabus->user_id=Auth::user()->id;
        $syllabus->save();

        Toastr::success('Syllabus seccessufly created','Success');
        return redirect()->route('syllabus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('syllabus.show',compact('syllabus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        $units = Unit::all();
        return view('syllabus.edit',compact('syllabus','units'));
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
        $syllabus = Syllabus::findOrFail($id);
        $syllabus->unit_id=$request->unit_id;
        $syllabus->desc=$request->description; 
        $syllabus->save();

        return redirect()->route('syllabus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        $syllabus->delete();
        return redirect()->back();

    }
}
