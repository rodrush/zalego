<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function lesson()
    {
        $lessons =Lesson::latest()->get();
        return view('lesson.lesson', compact('lessons'));
    }

    public function create() 
    {
        return view('lesson.create-lesson');
    }

    public function store(Request $request)
    {
        $lesson = new Lesson();
        $lesson->name =$request->name;
        $lesson->program =$request->program;
        $lesson->level =$request->level;
        $lesson->start =$request->start;
        $lesson->end =$request->end;
        $lesson->created_by=Auth::user()->name;
        $lesson->save();

        return redirect()->route('lesson');
    }

    public function editLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lesson.edit-lesson', compact('lesson'));
    }

    public function updateLesson( Request $request,$id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->name =$request->name;
        $lesson->program =$request->program;
        $lesson->level =$request->level;
        $lesson->start =$request->start;
        $lesson->end =$request->end;
        $lesson->save();

        return redirect()->route('show-lesson',$id);
    }

    public function showLesson($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lesson.show-lesson',compact('lesson'));
    }

    public function deleteLesson($id)
    { 
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->back();
    }
}


