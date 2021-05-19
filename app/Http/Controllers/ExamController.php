<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Examinations;

class ExamController extends Controller
{
    public function exams()
    {
        $today = date('Y-m-d');
        $exams = Examinations::orderBy('name','asc')->orderBy('description','desc')->simplepaginate(10);
        $numberOfExams = Examinations::whereYear('created_at',date('Y'))->count();
        return view('branch.exams',compact('exams','numberOfExams'));
    }


    public function exam(Request $request)
    {

        $this->validate($request,[ 
            'name'=>'required',
            'description'=>'required',
        ]);


        $exam = new Examinations();
        $exam->name = $request->name;
        $exam->description = $request->description;
        $exam->created_by = Auth::user()->name;
        $exam->save();

        return redirect()->back(); 
    }

    public function editExam($id)
    {
        $exam = Examinations::find($id);
        return view('branch.new_examinations',compact('exam'));
    }

    public function update(Request $request, $id)
    {
        $exam = Examinations::findOrFail($id);
        $exam->name = $request->name;
        $exam->description = $request->description;
        $exam->save();

        return redirect()->route('exams');
    }

    public function deleteExam($id)
    {
        $exam =   Examinations::findOrFail($id);
        $exam->delete();
        
        return redirect()->back();
    } 

    public function showExam($id)
    {
        $exam = Examinations::findOrFail($id);

        return view('branch.show-exams', compact('exam'));
    }

    
}
