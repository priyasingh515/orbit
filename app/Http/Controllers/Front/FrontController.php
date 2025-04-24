<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Otpsmodel;
use App\Models\QuestionPaper;
use App\Models\Slider;
use App\Models\About;
use App\Models\Plans;
use App\Models\Mains;
use App\Models\Settings;
use App\Models\Supports;
use App\Models\User;
use App\Models\Contacts;
use App\Models\AnswerSheet;
use App\Models\SampleEvaluation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\DoubtRaisedMail;
use DB;

class FrontController extends Controller
{
    //
    public function index(){
        $slider = Slider::all();   
        $settingsData = Settings::first();     
        $questionpapers = DB::table('question_papers')
            ->join('master_paper_type', 'question_papers.paper_type', '=', 'master_paper_type.id')
            ->where('question_papers.state', 'cg')
            ->select('question_papers.*', 'master_paper_type.paper_type_name as paper_name')
            ->latest()
            ->take(4)
            ->get();
        $aboutData = About::latest()->first();
        $Guides = Supports::all();
        $plans = Plans::where('state', 'cg')->get();
        $samples = SampleEvaluation::get();
        $offers = DB::table('offers')->first();
        $cgDistricts = DB::table('cg_district')->orderBy('name', 'asc')->get();
        return view('front.cghome',compact('offers','slider','questionpapers','aboutData','plans','settingsData','Guides','samples','cgDistricts'));
    }

    public function mphome(){
        $slider = Slider::all(); 
        $settingsData = Settings::first(); 
        $mpDistricts = DB::table('mp_district')->orderBy('name', 'asc')->get();      
        $questionpapers = DB::table('question_papers')
            ->leftJoin('master_paper_type', 'question_papers.paper_type', '=', 'master_paper_type.id')
            ->where('question_papers.state', 'mp')
            ->select('question_papers.*', 'master_paper_type.paper_type_name as paper_name')
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($questionpapers) {
            if ($questionpapers->paper_type == 14) {
                $questionpapers->paper_name = 'Paper A';
            } elseif ($questionpapers->paper_type == 15) {
                $questionpapers->paper_name = 'Paper B';
            }
            return $questionpapers;
        });
        $aboutData = About::latest()->first();
        $plans = Plans::where('state', 'mp')->get();
        $Guides = Supports::all();
        $samples = SampleEvaluation::get();
        $offers = DB::table('offers')->first();
        return view('front.mphome',compact('offers','slider','questionpapers','aboutData','plans','settingsData','Guides','samples','mpDistricts'));
    }

    public function home(){
        $settingsData = Settings::first();
        return view('front.home',compact('settingsData'));
    }

    public function aboutus(){
        $about = About::all();
        $offers = DB::table('offers')->first();
        $settingsData = Settings::first();
        return view('front.aboutus',compact('about','settingsData','offers'));
    }
    public function contact(){
        $offers = DB::table('offers')->first();
        $settingsData = Settings::first();
        return view('front.contact',compact('settingsData','offers'));
    }
    public function ourplan(){
        $mpDistricts = DB::table('mp_district')->orderBy('name', 'asc')->get();
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $plans = Plans::where('state', 'mp')->get();
        return view('front.ourplan',compact('plans','settingsData','mpDistricts','offers'));
    }
   
    public function pyq(){
        $settingsData = Settings::first();
        $questionpapers = DB::table('question_papers')
            ->leftJoin('master_paper_type', 'question_papers.paper_type', '=', 'master_paper_type.id')
            ->where('question_papers.state', 'mp')
            ->select('question_papers.*', 'master_paper_type.paper_type_name as paper_name')
            ->get()
            ->map(function ($questionpapers) {
            if ($questionpapers->paper_type == 14) {
                $questionpapers->paper_name = 'Paper A';
            } elseif ($questionpapers->paper_type == 15) {
                $questionpapers->paper_name = 'Paper B';
            }
            return $questionpapers;
        })
        ->groupBy('paper_name');
        $offers = DB::table('offers')->first();
        return view('front.pyq',compact('questionpapers','settingsData','offers'));
    }


    public function cgpyq(){
        $settingsData = Settings::first();
        $cgpyq = DB::table('question_papers')
        ->leftJoin('master_paper_type', 'question_papers.paper_type', '=', 'master_paper_type.id')
        ->where('question_papers.state', 'cg')
        ->select('question_papers.*', 'master_paper_type.paper_type_name as paper_name')
        ->get()
        ->groupBy('paper_name');
        $offers = DB::table('offers')->first();
        return view('front.cgpyq',compact('cgpyq','settingsData','offers'));
    }

    
    public function sendOtp(Request $request){
        $request->validate([
            'email' => 'required|email|email',
            // 'state' => 'required'
        ]);

        $state = Session::get('selected_state'); 

        if (!$state) {
            return redirect()->back()->with('error', 'Please select CG or MP first.');
        }
        
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'state' => $state,
            ]);
        }
        
         $otpCode = rand(1000, 9999);

         $otp = Otpsmodel::create([
            'user_id' => $user->id,
            'otp' => $otpCode,
            'is_active' => false
        ]);
        Session::put('email', $request->email);
               
            Mail::raw("Your OTP for login is: $otpCode", function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Your OTP Code');
            });

           
            return redirect()->back()->with('otp_sent', true);
    }

    // public function verifyOtp(Request $request)
    // {
    //     $request->validate([
    //         'otp' => 'required|digits:4'
    //     ]);

    //     $userEmail = Session::get('email');
    //     if (!$userEmail) {
    //         return response()->json(['error' => 'Session expired, please retry.'], 401);
    //     }

    //     $user = User::where('email', $userEmail)->latest()->first();

    //     if (!$user) {
    //         return redirect()->back()->with('error', 'User not found.');

    //     }

    //     $otp = OtpsModel::where('user_id', $user->id)->where('otp', $request->otp)->latest()->first();

        
    //     if (!$otp) {
    //         return redirect()->back()->with('error', 'Invalid OTP.');
    //     }
    //     $otp->update(['is_active' => true]);

    //     Auth::login($user);
    
    //     return redirect()->route('user.questionadd')->with('success', 'OTP Verified! Login successful.');
    
    // }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4'
        ]);

        $userEmail = Session::get('email');
        if (!$userEmail) {
            return response()->json(['error' => 'Session expired, please retry.'], 401);
        }

        $user = User::where('email', $userEmail)->latest()->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $otp = OtpsModel::where('user_id', $user->id)->where('otp', $request->otp)->latest()->first();

        if (!$otp) {
            return redirect()->back()->with('error', 'Invalid OTP.');
        }

        $otp->update(['is_active' => true]);
        Auth::login($user);

        $hasPlan = DB::table('user_plans')
                    ->where('user_id', $user->id)
                    ->where('status', 'active') 
                    ->exists();

        if ($hasPlan) {
            return redirect()->route('user.count')->with('success', 'Welcome back! You already have a plan.');
        }

        return redirect()->route('user.questionadd')->with('success', 'OTP Verified! Please continue.');
    }


     public function submitquestion(){
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        // $userState = auth()->user()->state;
        // $papers = DB::table('master_paper_type')->where('state', $userState)->get();
        return view('front.user.submitanswer',compact('settingsData','offers'));


     }

     public function answerForm(){
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $userId = Auth::user()->id;
        if (Auth::check()) {
            $user = Auth::user(); 
            // dd($user);

            if ($user->state == 'cg') {
                $papers = DB::table('master_paper_type')->where('state', 'cg')->get();
            } elseif ($user->state == 'mp') {
                $papers = DB::table('master_paper_type')->where('state', 'mp')->get();
            } else {
                $papers = DB::table('master_paper_type')->get();
            }

            // $answers = AnswerSheet::latest()->take(5)->get();
            $answers = DB::table('answer_sheets')
                ->leftJoin('master_paper_type', 'answer_sheets.paper_type_id', '=', 'master_paper_type.id')
                ->where('answer_sheets.student_id', $userId)
                ->select(
                    'answer_sheets.*',
                    'master_paper_type.paper_type_name as paper_type_name',
                )
                ->latest()
                ->take(4)
                ->get();

                $user = Auth::user();

                // User ke active plan ko fetch karna
                $activePlan = DB::table('user_plans')
                    ->where('user_id', $user->id)
                    ->where('status', 'active')
                    ->orderBy('purchase_date', 'desc')
                    ->first();

                $hasPlan = DB::table('user_plans')
                    ->where('user_id', Auth()->id())
                    ->where('status', 'active') 
                    ->exists();

            return view('front.user.anseraddform',compact('papers','answers','activePlan','hasPlan','settingsData','offers'));
        }
    }

    public function getSubjects($paperId)
    {
        $subjects = DB::table('master_subject')
                      ->where('paper_type_id', $paperId)
                      ->get();

        return response()->json($subjects);
    }

    // public function signin(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email'
    //     ]);

    //     try {

    //         $state = Session::get('selected_state'); 

    //         if (!$state) {
    //             return redirect()->back()->with('error', 'Please select CG or MP first.');
    //         }
    //         // Check if user exists
    //         $user = User::where('email', $request->email)->first();

    //         if (!$user) {
    //             // User create karein agar exist nahi karta
    //             $user = User::create([
    //                 'name' => $request->name,
    //                 'email' => $request->email
    //                 'state'=>$state;
    //             ]);
    //         }

    //         Auth::login($user);

    //         // Authentication ke liye token generate karein (Optional)
    //         $token = $user->createToken('authToken')->plainTextToken;

    //         return response()->json([
    //             'message' => 'User signed in successfully!',
    //             'user' => $user,
    //             'token' => $token  // Send token for authentication
    //         ], 201);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => 'Something went wrong!',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function signin(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'state' => 'nullable|string'
    ]);

    try {
        $state = $request->state ?? Session::get('selected_state'); 

        if (!$state) {
            return response()->json([
                'error' => 'Please select CG or MP first.'
            ], 400);
        }

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // User create karein agar exist nahi karta
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'state' => $state
            ]);
        }

        Auth::login($user);

        // Authentication ke liye token generate karein (Optional)
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User signed in successfully!',
            'user' => $user,
            'token' => $token
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Something went wrong!',
            'message' => $e->getMessage()
        ], 500);
    }
}

    public function allanswer(){
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $userId = Auth::user()->id;
        $userState = Auth::user()->state;
        $user = Auth::user();
        $answers = DB::table('answer_sheets')
            ->join('master_paper_type', 'answer_sheets.paper_type_id', '=', 'master_paper_type.id')
            ->where('answer_sheets.student_id', $userId)
            ->select(
                'answer_sheets.*', 
                'master_paper_type.paper_type_name as paper_type_name', 
            )
            ->paginate(6);

        $paperTypes = DB::table('master_paper_type')->where('state',$userState)->get();

            $activePlan = DB::table('user_plans')
                ->where('user_id', $user->id)
                ->where('status', 'active')
                ->orderBy('purchase_date', 'desc')
                ->first();
            $hasPlan = DB::table('user_plans')
                ->where('user_id', Auth()->id())
                ->where('status', 'active') 
                ->exists();
                
        return view('front.user.allanswer', compact('answers','activePlan','hasPlan','paperTypes','settingsData','offers'));
    }


    // public function doubt(Request $request)
    // {
    //     $request->validate([
    //         'answer_id' => 'required',
    //         'description' => 'required|string|max:1000',
    //     ]);

    //     $answer = DB::table('checked_answer_sheets')->where('answer_sheet_id', $request->answer_id)->first();
    //     // dd($answer);

    //     // Agar koi teacher ne check nahi kiya, to doubt submit na ho
    //     if (!$answer->teacher_id) {
    //         return response()->json(['status' => 'error', 'message' => 'This answer is not yet checked by any teacher!'], 400);
    //     }

    //     // Doubt save karein, teacher_id bhi store ho
    //     DB::table('doubts')->insert([
    //         'user_id' => auth()->id(), // Logged-in user ka ID
    //         'answer_id' => $request->answer_id,
    //         'teacher_id' => $answer->teacher_id, // Usi teacher ka ID jo answer check kar chuka hai
    //         'description' => $request->description,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     return response()->json(['status' => 'success', 'message' => 'Doubt submitted successfully!']);
    // }

    public function doubt(Request $request)
    {
        
        $request->validate([
            'answer_id' => 'required',
            'description' => 'required|string|max:1000',
            'doubt_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:10240',
        ]);

        $answer = DB::table('checked_answer_sheets')->where('answer_sheet_id', $request->answer_id)->first();

        if (!$answer->teacher_id) {
            return response()->json(['status' => 'error', 'message' => 'This answer is not yet checked by any teacher!'], 400);
        }

        $doubtFilePath = null;
        if ($request->hasFile('doubt_file')) {
            $file = $request->file('doubt_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('doubts'); 

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename); 

            $doubtFilePath = 'doubts/' . $filename; 
        }

        DB::table('doubts')->insert([
            'user_id' => auth()->id(),
            'answer_id' => $request->answer_id,
            'teacher_id' => $answer->teacher_id,
            'description' => $request->description,
            'doubt_file' => $doubtFilePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Get evaluator email
        $teacher = DB::table('users')->where('id', $answer->teacher_id)->first();

        if ($teacher && $teacher->email) {
            Mail::to($teacher->email)->send(new DoubtRaisedMail($request->description, $doubtFilePath));
        }

        return response()->json(['status' => 'success', 'message' => 'Doubt submitted and mail sent to evaluator!']);
    }


    public function purchase(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Please log in first!'], 401);
        }

        $plan = DB::table('plans')->where('id', $request->plan_id)->first();
        if (!$plan) {
            return response()->json(['status' => 'error', 'message' => 'Invalid Plan!'], 400);
        }

        // Validate Form Data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'district' => 'required|string|max:255',
        ]);

        // **Step 1: Update User Table**
        DB::table('users')->where('id', $user->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'district' => $request->district,
            'updated_at' => now(),
        ]);

        // **Step 2: Store Plan Purchase Details**
        $validityDays = intval(preg_replace('/[^0-9]/', '', $plan->plan_validity));
        $purchaseDate = now();
        $expiryDate = $purchaseDate->copy()->addDays($validityDays);

        DB::table('user_plans')->insert([
            'user_id' => $user->id,
            'state' => $user->state,
            'plan_id' => $plan->id,
            'purchase_date' => $purchaseDate,
            'expiry_date' => $expiryDate,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // return response()->json(['status' => 'success', 'message' => 'Plan Purchased Successfully!']);
        return response()->json(['status' => 'success', 'message' => 'Plan Purchased Successfully!','redirect_url' => route('plan.payment')]);

    }

    public function payment(){
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        return view('front.payment',compact('settingsData','offers'));
    }


    // public function answerstore(Request $request)
    // {
    //     $user = Auth::user();

    //     $request->validate([
    //         'question_no' => 'required',
    //         'paper_type_id' => 'required',
    //         'answer_sheet' => 'required|mimes:pdf,jpg,png|max:10240',
    //     ]);

    //     $totalAnswers = AnswerSheet::where('student_id', $user->id)->count();

    //     $activePlan = DB::table('user_plans')
    //         ->where('user_id', $user->id)
    //         ->where('status', 'active')
    //         ->where('expiry_date', '>=', Carbon::now())
    //         ->orderBy('expiry_date', 'desc')
    //         ->first();

    //     if (!$activePlan && $totalAnswers >= 2) {
    //         return redirect()->back()->with(['error' => 'You can only upload 2 answers. Purchase a plan for unlimited uploads.']);
    //     }

    //     if ($request->hasFile('answer_sheet')) {
    //         $file = $request->file('answer_sheet');
    //         $destinationPath = public_path('user/answer');

    //         if (!file_exists($destinationPath)) {
    //             mkdir($destinationPath, 0777, true);
    //         }

    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $file->move($destinationPath, $fileName);

    //         $answerSheet = new AnswerSheet();
    //         $answerSheet->student_id = $user->id;
    //         $answerSheet->answer_pdf = 'user/answer/' . $fileName;
    //         $answerSheet->status = 'pending';
    //         $answerSheet->question_no = $request->question_no;
    //         $answerSheet->paper_type_id = $request->paper_type_id;
    //         $answerSheet->save();

    //         return redirect()->back()->with('success', 'Answer sheet uploaded successfully!');
    //     }

    //     // return response()->json(['error' => 'File upload failed!'], 400);
    //     return redirect()->back()->with('error', 'File upload failed!');

    // }


    public function answerstore(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'question_no' => 'required',
            'paper_type_id' => 'required',
            'answer_sheet' => 'required|mimes:pdf,jpg,png|max:10240',
        ]);

        $totalAnswers = AnswerSheet::where('student_id', $user->id)->count();

        $activeePlan = DB::table('user_plans')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->where('expiry_date', '>=', Carbon::now())
            ->orderBy('expiry_date', 'desc')
            ->first();

        if (!$activeePlan && $totalAnswers >= 2) {
            return redirect()->back()->with(['error' => 'You can only upload 2 answers. Purchase a plan for unlimited uploads.']);
        }

        // Fetch paper type from master_paper_type table
        $paperType = DB::table('master_paper_type')->where('id', $request->paper_type_id)->first();

        if (!$paperType) {
            return redirect()->back()->with('error', 'Invalid paper type.');
        }

        $questionType = strtolower($paperType->type); // Assuming 'type' column has values like 'gs' or 'essay'

        // Fetch active plan
        $activePlan = DB::table('user_plans')
            ->join('plans', 'user_plans.plan_id', '=', 'plans.id')
            ->where('user_plans.user_id', $user->id)
            ->where('user_plans.status', 'active')
            ->where('user_plans.expiry_date', '>=', Carbon::now())
            ->orderBy('user_plans.expiry_date', 'desc')
            ->select('plans.daily_question_limit')
            ->first();

        $dailyLimit = $activePlan ? $activePlan->daily_question_limit : 2;

        // Define limits based on dailyLimit
        $gsLimit = $essayLimit = null;
        if ($dailyLimit == 0) {
            $gsLimit = $essayLimit = null; // Unlimited
        } elseif ($dailyLimit == 3) {
            $gsLimit = 2;
            $essayLimit = 1;
        } elseif ($dailyLimit == 4) {
            $gsLimit = 3;
            $essayLimit = 1;
        } elseif ($dailyLimit == 5) {
            $gsLimit = 4;
            $essayLimit = 1;
        } else {
            // Default limits
            $gsLimit = 1;
            $essayLimit = 1;
        }

        // Count today's uploads
        $todayStart = Carbon::today();
        $todayEnd = Carbon::now();

        $gsUploads = DB::table('answer_sheets')
            ->join('master_paper_type', 'answer_sheets.paper_type_id', '=', 'master_paper_type.id')
            ->where('answer_sheets.student_id', $user->id)
            ->where('master_paper_type.type', 'gs')
            ->whereBetween('answer_sheets.created_at', [$todayStart, $todayEnd])
            ->count();

        $essayUploads = DB::table('answer_sheets')
            ->join('master_paper_type', 'answer_sheets.paper_type_id', '=', 'master_paper_type.id')
            ->where('answer_sheets.student_id', $user->id)
            ->where('master_paper_type.type', 'essay')
            ->whereBetween('answer_sheets.created_at', [$todayStart, $todayEnd])
            ->count();

        // Check limits
        if ($questionType == 'gs' && $gsLimit !== null && $gsUploads >= $gsLimit) {
            return redirect()->back()->with('error', "You can only upload {$gsLimit} GS answer(s) per day.");
        }

        if ($questionType == 'essay' && $essayLimit !== null && $essayUploads >= $essayLimit) {
            return redirect()->back()->with('error', "You can only upload {$essayLimit} Essay answer(s) per day.");
        }

        // File upload logic
        if ($request->hasFile('answer_sheet')) {
            $file = $request->file('answer_sheet');
            $destinationPath = public_path('user/answer');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);

            DB::table('answer_sheets')->insert([
                'student_id' => $user->id,
                'answer_pdf' => 'user/answer/' . $fileName,
                'status' => 'pending',
                'question_no' => $request->question_no,
                'paper_type_id' => $request->paper_type_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Answer sheet uploaded successfully!');
        }

        return redirect()->back()->with('error', 'File upload failed!');
    }


    public function viewCheckedSheet($id)
    {
        $userId = Auth::id();
        $user = Auth::user();
        $answers = DB::table('answer_sheets')
                ->join('master_paper_type', 'answer_sheets.paper_type_id', '=', 'master_paper_type.id')
                ->leftJoin('checked_answer_sheets', 'checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
                ->leftJoin('users as teachers', 'checked_answer_sheets.teacher_id', '=', 'teachers.id')
                ->leftJoin('doubts', 'answer_sheets.id', '=', 'doubts.answer_id')
                ->where('answer_sheets.student_id', $user->id)
                ->where('answer_sheets.paper_type_id', $id)
                ->select(
                    'answer_sheets.*',
                    'master_paper_type.paper_type_name',
                    'checked_answer_sheets.checked_file_path as check_file',
                    'checked_answer_sheets.remark',
                    'teachers.name as teacher_name',
                    'doubts.id as doubt_id'
                    )
                ->get();

        // Plan check karne ke liye
        $hasPlan = DB::table('user_plans')
            ->where('user_id', $userId)
            ->where('status', 'active')
            ->exists();

        $activePlan = DB::table('user_plans')
            ->where('user_id', $userId)
            ->where('status', 'active')
            ->orderBy('purchase_date', 'desc')
            ->first();
            
            $settingsData = Settings::first();
            $offers = DB::table('offers')->first();
        return view('front.user.checkedlist', compact('answers', 'hasPlan', 'activePlan','settingsData','offers'));
    }

     public function logout(Request $request)
    {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully.');
    }

    public function mainsPractice(){
        
        // $papers = Mains::orderBy('paper_type', 'asc')->get()->groupBy('paper_type');
        $papers = Mains::select('mains.*', 'master_paper_type.paper_type_name as paper_type_name', 'master_subject.subject_name as subject_name')
            ->join('master_paper_type', 'mains.paper_type', '=', 'master_paper_type.id')
            ->join('master_subject', 'mains.subject_type', '=', 'master_subject.id')
            ->orderBy('master_paper_type.id', 'asc')
            ->get()
            ->groupBy('paper_type_name');
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();

        return view('front.user.mainspractice',compact('papers','settingsData','offers'));

    }

    public function cgplan(){
        $cgDistricts = DB::table('cg_district')->orderBy('name', 'asc')->get();
        $settingsData = Settings::first();
        $cgplans = Plans::where('state', 'cg')->get();
        $offers = DB::table('offers')->first();
        return view('front.cgplan',compact('cgplans','settingsData','cgDistricts','offers'));
    }

    public function enquery(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            // 'subject' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'message' => 'required|string',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Contacts::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'subject' => $request->subject,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'state' => $request->state,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function userdash(){

        $user = Auth::user();
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $hasPlan = DB::table('user_plans')
            ->where('user_id', Auth()->id())
            ->where('status', 'active') 
            ->exists();


        $activePlan = DB::table('user_plans')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->orderBy('purchase_date', 'desc')
            ->first();
        return view('front.user.userdash',compact('hasPlan','activePlan','settingsData','offers'));
    }

    public function currentAffair(){
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $user = Auth::user();
        $activePlan = DB::table('user_plans')
                ->where('user_id', $user->id)
                ->where('status', 'active')
                ->orderBy('purchase_date', 'desc')
                ->first();
        $currentAffairs = DB::table('weekly_tests')->paginate(6);;
        $hasPlan = DB::table('user_plans')
            ->where('user_id', Auth()->id())
            ->where('status', 'active') 
            ->exists();
        return view('front.user.monthly_current',compact('currentAffairs','activePlan','hasPlan','settingsData','offers'));
    }


    public function usercount(){
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $user = Auth::user();
        $hasPlan = DB::table('user_plans')
            ->where('user_id', Auth()->id())
            ->where('status', 'active') 
            ->exists();
        $activePlan = DB::table('user_plans')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->orderBy('purchase_date', 'desc')
            ->first();

            $userId = auth()->id();

            $totalSubmitted = DB::table('answer_sheets')->where('student_id', $userId)->count(); 
            $totalEvaluated = DB::table('answer_sheets')->where('student_id', $userId)->where('status', 'checked')->count();
            $totalPending = DB::table('answer_sheets')->where('student_id', $userId)->where('status', 'pending')->count(); 

        return view('front.user.usercount',compact('hasPlan','activePlan','totalSubmitted','totalEvaluated','totalPending','settingsData','offers'));
    }

    public function message(){
        $user = Auth::user();
        // dd($user);
        $settingsData = Settings::first();
        $offers = DB::table('offers')->first();
        $hasPlan = DB::table('user_plans')
            ->where('user_id', Auth()->id())
            ->where('status', 'active') 
            ->exists();
        $activePlan = DB::table('user_plans')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->orderBy('purchase_date', 'desc')
            ->first();

            $message = DB::table('doubts')
                ->leftJoin('users', 'users.id', '=', 'doubts.user_id')
                ->leftJoin('answer_sheets', 'doubts.answer_id', '=', 'answer_sheets.id')
                ->select('doubts.*', 'users.email','users.name as username')
                ->where('doubts.user_id', $user->id) // `doubts.user_id` likhna zaroori hai
                ->get();

                // dd($message);
        
        return view('front.user.message',compact('message','hasPlan','activePlan','settingsData','offers'));
    }



}
