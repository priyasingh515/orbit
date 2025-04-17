<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionPaper;
use App\Models\WeeklyTest;
use Smalot\PdfParser\Parser;
use Spatie\PdfToImage\Pdf;
use DB;
use Illuminate\Support\Facades\Storage;



class QuestionController extends Controller
{
    //

    public function index(){
        $questions = DB::table('question_papers')
        ->leftJoin('master_paper_type','master_paper_type.id','=','question_papers.paper_type')
        ->leftJoin('master_subject','master_subject.id','=','question_papers.subject_type')
        ->select('question_papers.*','master_paper_type.paper_type_name as paper_name','master_subject.subject_name as subject')
        ->orderBy('question_papers.id', 'desc')
        ->get()
      
        ->map(function ($question) {
            if ($question->paper_type == 14) {
                $question->paper_name = 'Paper A';
            } elseif ($question->paper_type == 15) {
                $question->paper_name = 'Paper B';
            }
            return $question;
        });
      
        return view('admin.questions.list',compact('questions'));
    }

    public function create(){
        return view('admin.questions.create');
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'paper_type' => 'required',
            'file' => 'required|mimes:pdf|max:10240',
            'subject_type' => 'nullable',
            'part' => 'nullable',
            'state' => 'required',
        ], [
            // 'name.regex' => 'The name field must contain only letters and spaces.',
            'file.required' => 'The PDF file is required.',
            'file.mimes' => 'Only PDF files are allowed.',
            'file.max' => 'The file size must not exceed 10MB.'
        ]);

       

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'admin/pdfs/' . $filename;

            if (!file_exists(public_path('admin/pdfs'))) {
                mkdir(public_path('admin/pdfs'), 0777, true);
            }

            $file->move(public_path('admin/pdfs'), $filename);
            //  dd($request->all());
            QuestionPaper::create([
                'paper_type' => $request->paper_type,
                'state' => $request->state,
                'subject_type' => $request->subject_type,
                'part' => $request->part,
                'pdf_path' => $filePath,
            ]);

            // return redirect()->back()->with('success', 'Question Paper uploaded successfully!');
            return redirect()->route('question.index')->with('success', 'Question Paper uploaded successfully!');

        }

        return redirect()->back()->with('error', 'File upload failed!');
    }

    public function edit($id){
        $questions = QuestionPaper::find($id);
        return view('admin.questions.edit',compact('questions'));

    }


    public function update(Request $request, $id)
    {
        $questionPaper = QuestionPaper::findOrFail($id);

        $request->validate([
            'paper_type' => 'required',
            'file' => 'nullable|mimes:pdf|max:10240',
            'subject_type' => 'nullable',
            'part' => 'nullable',
            'state' => 'required',

        ], [
            'file.mimes' => 'Only PDF files are allowed.',
            'file.max' => 'The file size must not exceed 10MB.'
        ]);

        $questionPaper->paper_type = $request->paper_type;
        $questionPaper->subject_type = $request->subject_type;
        $questionPaper->part = $request->part;
        $questionPaper->state = $request->state;

        if ($request->hasFile('file')) {
      
            if (file_exists(public_path($questionPaper->pdf_path))) {
                unlink(public_path($questionPaper->pdf_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'admin/pdfs/' . $filename;

            $file->move(public_path('admin/pdfs'), $filename);

            $questionPaper->pdf_path = $filePath;
        }

        $questionPaper->save();

        return redirect()->route('question.index')->with('success', 'Question Paper updated successfully!');
    }

    public function destroy($id)
    {
        $question = QuestionPaper::find($id);

        if (!$question) {
            return redirect()->route('question.index')->with('error', 'Question Paper not found!');
        }

        if ($question->pdf_path && file_exists(public_path($question->pdf_path))) {
            unlink(public_path($question->pdf_path));
        }

        $question->delete();

        return redirect()->route('question.index')->with('success', 'Question Paper deleted successfully!');
    }


    // public function getPaperTypes(Request $request)
    // {
    //     $state = $request->state;

    //     if ($state == 'cg') {
    //         // Agar state CG hai, to database se paper types fetch karenge
    //         // $paperTypes = PaperType::select('id', 'name')->get(); 
    //         $paperTypes =DB::table('master_paper_type')->
    //                    select('id', 'paper_type_name')->get(); 
    //     } else {
    //         // Agar MP hai, to static data bhejenge
    //         $paperTypes = [
    //             ['id' => 1, 'name' => 'Part A'],
    //             ['id' => 2, 'name' => 'Part B'],
    //         ];
    //     }

    //     // dd($paperTypes);

    //     return response()->json($paperTypes);
    // }

    public function getPaperTypess(Request $request)
    {
        $state = $request->query('state');
       

        $paperTypes = DB::table('master_paper_type')
                        ->where('state', $state)
                        ->get();

                        

        return response()->json($paperTypes);
    }


 // weekly test 

 public function weeklyIndex(){
        $weeklyData = WeeklyTest::get();
        return view('admin.weeklyTest.index',compact('weeklyData'));
     }

     public function weeklyCreate(){
        return view('admin.weeklyTest.create');
     }


     public function weeklystore(Request $request)
    {
        $request->validate([
            'state' => 'required|string',
            'year' => 'required|string|max:255',
            'weekly_file' => 'required|mimes:pdf|max:10240',
        ]);

        $filePath = null;
        if ($request->hasFile('weekly_file')) {
            $file = $request->file('weekly_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('admin/weeklyTest');
            $file->move($destinationPath, $fileName);
            $filePath = 'admin/weeklyTest/' . $fileName;
        }

        $weeklyQuestion = new WeeklyTest();
        $weeklyQuestion->state = $request->state;
        $weeklyQuestion->year = $request->year;
        $weeklyQuestion->weekly_file = $filePath;
        $weeklyQuestion->save();

        return redirect()->route('weekly.index')->with('success', 'Question created successfully!');
    }

    public function weeklyedit($id){
        $weeklyData = WeeklyTest::find($id);
        return view('admin.weeklyTest.edit',compact('weeklyData'));
    }

    

    public function weeklyupdate(Request $request, $id)
    {
        $Testquestion = WeeklyTest::findOrFail($id);

        $request->validate([
            'state' => 'required|string',
            'year' => 'required|string|max:255',
            'weekly_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('weekly_file')) {
            if ($Testquestion->weekly_file && file_exists(public_path($Testquestion->weekly_file))) {
                unlink(public_path($Testquestion->weekly_file));
            }

            $file = $request->file('weekly_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('admin/weeklyTest/');
            $file->move($destinationPath, $fileName);
            $Testquestion->weekly_file = 'admin/weeklyTest/' . $fileName;
        }

        $Testquestion->state = $request->state;
        $Testquestion->year = $request->year;
        $Testquestion->save();

        return redirect()->route('weekly.index')->with('success', 'Question updated successfully!');
    }


    public function weeklydestroy($id)
    {
        $weekquestion = WeeklyTest::find($id);

        if (!$weekquestion) {
            return redirect()->route('weekly.index')->with('error', 'Question Paper not found!');
        }

        if ($weekquestion->weekly_file && file_exists(public_path($weekquestion->weekly_file))) {
            unlink(public_path($weekquestion->weekly_file));
        }

        $weekquestion->delete();

        return redirect()->route('weekly.index')->with('success', 'Question Paper deleted successfully!');
    }
     


}
