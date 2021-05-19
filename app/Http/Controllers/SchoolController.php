<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schools;

class SchoolController extends Controller 
{
    public function school() 
    {
        $schools = Schools::latest()->paginate(5);
        return view('shule.school',compact('schools'));
    } 

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:200',
            'description'=>'required'
        ]);

        $school = new Schools();
        $school->name=$request->name;
        $school->description=$request->description;
        $school->created_by = Auth::user()->name;
        $school->save();

        return redirect()->back(); 
    }
    public function editSchool($id)
    {
        $school = Schools::find($id);
        return view('shule.edit-school',compact('school'));
    }

    public function updateSchool(Request $request, $id)
    {
        $school = Schools::findOrFail($id);
        $school->name = $request->name;
        $school->description = $request->description;
        $school->save();

        return redirect()->route('school');
    }

    public function deleteSchool($id)
    {
        $school =   Schools::findOrFail($id);
        $school->delete();
        
        return redirect()->back();
    } 

    public function showSchool($id) 
    {
        $school = Schools::findOrFail($id);
        $courses = Course::where('schools_id','=',$id)->latest()->get();
        return view('shule.show-school', compact('school','courses'));
    }

}
