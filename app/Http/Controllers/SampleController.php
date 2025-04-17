<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SampleEvaluation;

class SampleController extends Controller
{
    //

    public function index(){
        $SampleData = SampleEvaluation::get();
        return view('admin.sample.index',compact('SampleData'));
        
    }

    public function create(){
        return view('admin.sample.create');

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'sample_file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('sample_file')) {
            $file = $request->file('sample_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('admin/sample');
            $file->move($destinationPath, $fileName);
        } else {
            $fileName = null;
        }

       
        SampleEvaluation::create([
            'name' => $request->name,
            'sample_file' =>$fileName,
        ]);

        return redirect()->route('sample.index')->with('success', 'Sample created successfully!');
    }


    public function edit($id){
        $Samples = SampleEvaluation::find($id);
        return view('admin.sample.edit',compact('Samples'));

    }



    public function update(Request $request, $id)
    {
      
        $sample = SampleEvaluation::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'sample_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $fileName = $sample->sample_file; 

        if ($request->hasFile('sample_file')) {
            
            if ($sample->sample_file && file_exists(public_path($sample->sample_file))) {
                unlink(public_path($sample->sample_file));
            }

            $file = $request->file('sample_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('admin/sample');
            $file->move($destinationPath, $fileName);
            $fileName = 'admin/sample/' . $fileName;
        }

        $sample->update([
            'name' => $request->name,
            'sample_file' => $fileName,
        ]);

        return redirect()->route('sample.index')->with('success', 'Sample updated successfully!');
    }


    public function destroy($id)
    {
        $samplesdata = SampleEvaluation::find($id);

        if (!$samplesdata) {
            return redirect()->route('sample.index')->with('error', 'Sample Paper not found!');
        }

        if ($samplesdata->sample_file && file_exists(public_path($samplesdata->sample_file))) {
            unlink(public_path($samplesdata->sample_file));
        }

        $samplesdata->delete();

        return redirect()->route('sample.index')->with('success', 'Sample Paper deleted successfully!');
    }



}
