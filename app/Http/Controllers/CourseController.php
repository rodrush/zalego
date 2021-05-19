<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Examinations;
use App\Models\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses =Course::latest()->get();
        return view('course.index', compact('courses'));
    }

    public function create() 
    {
        $schools = Schools::latest()->get();
        $exams = Examinations::all();
        return view('course.create-course', compact('schools','exams'));
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->name =$request->name;
        $course->schools_id =$request->school_id;
        $course->examinations_id =$request->exam_id;
        $course->duration =$request->duration;
        $course->desc =$request->description;
        $course->created_by=Auth::user()->id;
        $course->save();

        return redirect()->route('course');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $schools = Schools::latest()->get();
        $exams = Examinations::oldest()->get();
        return view('course.edit', compact('course','schools','exams'));
    }

    public function update( Request $request,$id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->schools_id = $request->school_id;
        $course->examinations_id = $request->exam_id;
        $course->duration = $request->duration;
        $course->desc = $request->description;
        $course->save();

        return redirect()->route('show-course',$id);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('course.show',compact('course'));
    }

    public function destroy($id)
    { 
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back();
    }
}
