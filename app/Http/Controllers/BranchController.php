<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;

class BranchController extends Controller 
{
    public function index()
    {
        $branches = Branch::all();
        // $branches = Branch::latest()->get();
        return view('branch.index',compact('branches'));
    }

    public function store(Request $request)
    {
    //    validation
        $this->validate($request,[
            'name'=>'required',
            'town'=>'required',
            'contact'=>'required' 
        ]);

        // saving the data
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->town = $request->town;
        $branch->contact = $request->contact;
        $branch->description = $request->description;
        $branch->created_by = Auth::user()->name;
        $branch->save();

        return redirect()->back();
    }

    // edit
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('branch.edit_page',compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->name = $request->name;
        $branch->town = $request->town;
        $branch->contact = $request->contact;
        $branch->description = $request->description;
        $branch->save();

        return redirect()->route('branch');
    }

    public function deleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        
        return redirect()->back();
    }

    public function showBranch($id)
    {
        $branch = Branch::findOrFail($id);

        return view('branch.show-branch', compact('branch'));
    }

    
    
}
