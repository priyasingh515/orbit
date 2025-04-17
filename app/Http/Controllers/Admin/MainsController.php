<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mains;
use DB;

class MainsController extends Controller
{
    //


    public function index(){

        $mainsPractice = DB::table('mains')
            ->leftJoin('master_paper_type', 'mains.paper_type', '=', 'master_paper_type.id')
            ->leftJoin('master_subject', 'mains.subject_type', '=', 'master_subject.id')
            ->select(
                'mains.*', 
                'master_paper_type.paper_type_name', 
                'master_subject.subject_name'
            )
            ->orderBy('mains.id', 'desc')
            ->get();
        return view('admin.mains.index',compact('mainsPractice'));
    }
    public function create(){
        $papers = DB::table('master_paper_type')->get();
        return view('admin.mains.create',compact('papers'));
    }

    public function getPaperTypes(Request $request)
    {
        $state = $request->query('state');
       

        $paperTypes = DB::table('master_paper_type')
                        ->where('state', $state)
                        ->get();

                        

        return response()->json($paperTypes);
    }


    public function getSubjects(Request $request)
    {
        $paperTypeId = $request->query('paper_type_id');

        $subjects = DB::table('master_subject')
                    ->where('paper_type_id', $paperTypeId)
                    ->get();

        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        $request->validate([
            'paper_type' => 'required',
            'subject_type' => 'nullable',
            'mains_file' => 'required|mimes:pdf|max:10240',
            'state'=>'required'

        ]);

        // File ko "public/uploads" me move karna
        if ($request->hasFile('mains_file')) {
            $file = $request->file('mains_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('admin/Mains');
            $file->move($destinationPath, $filename);
            $filePath = 'admin/Mains/' . $filename; 
        }

        $mainsSheet = new Mains();
        $mainsSheet->paper_type = $request->paper_type;
        $mainsSheet->subject_type = $request->subject_type;
        $mainsSheet->mains_file = $filePath;
        $mainsSheet->state = $request->state;

        $mainsSheet->save();

        return redirect()->route('mainspractice.index')->with('success', 'Question upload successfully!');
    }


    public function edit($id){
        $mainsData = DB::table('mains')
            ->join('master_paper_type', 'mains.paper_type', '=', 'master_paper_type.id')
            ->join('master_subject', 'mains.subject_type', '=', 'master_subject.id')
            ->select(
                'mains.*',
                'master_paper_type.paper_type_name',
                'master_subject.subject_name'
            )
            ->where('mains.id', $id)
            ->first();
        $paperTypes = DB::table('master_paper_type')->get();
        $subjectType = DB::table('master_subject')->get();
        return view('admin.mains.edit',compact('mainsData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'paper_type' => 'required',
            'subject_type' => 'required',
            'mains_file' => 'nullable|mimes:pdf|max:10240',
            'state'=>'required'

        ]);

        $mainSheet = Mains::findOrFail($id);

        if ($request->hasFile('mains_file')) {
           
            $oldFilePath = public_path($mainSheet->mains_file);
            if (file_exists($oldFilePath) && is_file($oldFilePath)) {
                unlink($oldFilePath);
            }

            $file = $request->file('mains_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('admin/Mains');
            $file->move($destinationPath, $filename);
            $mainSheet->mains_file = 'admin/Mains/' . $filename;
        }

        $mainSheet->paper_type = $request->paper_type;
        $mainSheet->subject_type = $request->subject_type;
        $mainSheet->state = $request->state;
        $mainSheet->save();

        return redirect()->route('mainspractice.index')->with('success', 'Answer sheet updated successfully!');
    }


    public function destroy($id)
    {
        $mainquestion = Mains::find($id);

        $mainquestion->delete();

        return redirect()->route('mainspractice.index')->with('success', ' deleted successfully!');
    }
}
