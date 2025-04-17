<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EvaluateController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\MainsController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\evaluate\LoginController as EvaluateLoginController;
use App\Http\Controllers\Front\FrontController;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/captcha', [LoginController::class, 'generateCaptcha']);

Route::group(['prefix'=>'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){

        Route::get('/login',[LoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[LoginController::class,'authenticate'])->name('admin.authenticate');

    });

    Route::group(['middleware'=>'admin.auth'],function(){

        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
        Route::get('/enquerylist',[HomeController::class,'enquery'])->name('enquerylist.index');
        Route::get('/enquerylist/{id}',[HomeController::class,'enqDlt'])->name('enquerylist.delete');
        Route::get('/Doubtlist',[HomeController::class,'doubts'])->name('Doubtlist.index');
        Route::get('/doubtDlt/{id}',[HomeController::class,'doubtDlt'])->name('doubtDlt.delete');
        Route::get('/mplogin',[HomeController::class,'mplogin'])->name('mplogin.student');
        Route::get('/cglogin',[HomeController::class,'cglogin'])->name('cglogin.student');
        Route::get('/cgloginDlt/{id}',[HomeController::class,'cgloginDlt'])->name('cgdlt.student');
        Route::get('/mploginDlt/{id}',[HomeController::class,'mploginDlt'])->name('mpdlt.student');

        // //Evaluate Route
        Route::get('/evaluate',[EvaluateController::class,'index'])->name('evaluate.index');
        Route::get('/evaluate/create',[EvaluateController::class,'create'])->name('evaluate.create');
        Route::post('/evaluate/store',[EvaluateController::class,'store'])->name('evaluate.store');
        Route::get('/evaluate/{id}',[EvaluateController::class,'edit'])->name('evaluate.edit');
        Route::post('/evaluate/update/{id}',[EvaluateController::class,'update'])->name('evaluate.update');
        Route::get('/evaluate/delete/{id}', [EvaluateController::class, 'destroy'])->name('evaluate.delete');
        Route::get('/questionList',[EvaluateController::class,'student_questionList'])->name('student.questionList');
        Route::get('/student/answerEdit/{id}',[EvaluateController::class,'student_answerEdit'])->name('student.answerEdit');
        Route::post('/student/uploadCheckedSheet/{id}',[EvaluateController::class,'uploadCheckedSheet'])->name('student.uploadCheckedSheet');
        Route::get('/checked',[EvaluateController::class,'checkedList'])->name('checked.list');
        Route::get('/message',[EvaluateController::class,'studentMessage'])->name('message.list');

        Route::post('/send-reply', [EvaluateController::class, 'storeReply'])->name('send.reply');


        //Students Route
        Route::get('/student',[StudentController::class,'index'])->name('student.index');
        Route::get('/mpstudentList',[StudentController::class,'mpstudentList'])->name('student.mpstudentList');
        Route::get('/studentView/{id}',[StudentController::class,'studentView'])->name('student.view');
        Route::get('/ansswerEdit/{id}/{type}',[StudentController::class,'ansswerEdit'])->name('student.ansswerEdit');
        Route::post('/student/assign',[StudentController::class,'assignToTeacher'])->name('student.assign');
        Route::get('/mpstudent/{id}', [StudentController::class, 'mpstudentanswer'])->name('mpstudent.delete');
        Route::get('/cgstudent/{id}', [StudentController::class, 'cgstudentDlt'])->name('cgstudent.delete');
            //Question Route
        Route::get('/question',[QuestionController::class,'index'])->name('question.index');
        Route::get('/question/create',[QuestionController::class,'create'])->name('question.create');
        Route::post('/question/store',[QuestionController::class,'store'])->name('question.store');
        Route::get('/question/{id}',[QuestionController::class,'edit'])->name('question.edit');
        Route::post('/question/update/{id}',[QuestionController::class,'update'])->name('question.update');
        Route::get('/question/delete/{id}', [QuestionController::class, 'destroy'])->name('question.delete');


        Route::get('/weeklyIndex',[QuestionController::class,'weeklyIndex'])->name('weekly.index');
        Route::get('/weekly/create',[QuestionController::class,'weeklyCreate'])->name('weekly.create');
        Route::post('/weekly/store',[QuestionController::class,'weeklystore'])->name('weekly.store');
        Route::get('/weekly/{id}',[QuestionController::class,'weeklyedit'])->name('weekly.edit');
        Route::post('/weekly/update/{id}',[QuestionController::class,'weeklyupdate'])->name('weekly.update');
        Route::get('/weekly/delete/{id}', [QuestionController::class, 'weeklydestroy'])->name('weekly.delete');
        Route::get('/get-paper-types', [QuestionController::class, 'getPaperTypess']);


        // Slider Route

        Route::get('/slider',[SliderController::class,'index'])->name('slider.index');
        Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
        Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
        Route::get('/slider/{id}',[SliderController::class,'edit'])->name('slider.edit');
        Route::post('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
        Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');


        // About Route 
        Route::get('/about',[AboutController::class,'index'])->name('about.index');
        Route::get('/about/create',[AboutController::class,'create'])->name('about.create');
        Route::post('/about/store',[AboutController::class,'store'])->name('about.store');
        Route::get('/about/{id}',[AboutController::class,'edit'])->name('about.edit');
        Route::post('/about/update/{id}',[AboutController::class,'update'])->name('about.update');
        Route::get('/about/delete/{id}', [AboutController::class, 'destroy'])->name('about.delete');
        
        // Plan Route 
        Route::get('/plan',[PlanController::class,'index'])->name('plan.index');
        Route::get('/plan/create',[PlanController::class,'create'])->name('plan.create');
        Route::post('/plan/store',[PlanController::class,'store'])->name('plan.store');
        Route::get('/plan/{id}',[PlanController::class,'edit'])->name('plan.edit');
        Route::post('/plan/update/{id}',[PlanController::class,'update'])->name('plan.update');
        Route::get('/plan/delete/{id}', [PlanController::class, 'destroy'])->name('plan.delete');
        Route::get('/planpending', [PlanController::class, 'pendingPlan'])->name('plan.pending');
        Route::get('/planPurchase', [PlanController::class, 'purchasePlan'])->name('plan.purchase');
        Route::post('/update-plan-status', [PlanController::class, 'updateStatus'])->name('update.plan.status');
        Route::get('/purchase/delete/{id}', [PlanController::class, 'purchasedestroy'])->name('purchaseplan.delete');
        Route::get('/pending/delete/{id}', [PlanController::class, 'pendingdestroy'])->name('pendingplan.delete');



        //Mains route
        Route::get('/practice_mains',[MainsController::class,'index'])->name('mainspractice.index');
        Route::get('/mains/create',[MainsController::class,'create'])->name('mains.create');
        Route::post('/mains/store',[MainsController::class,'store'])->name('mains.store');
        Route::get('/mains/edit/{id}',[MainsController::class,'edit'])->name('mains.edit');
        Route::post('/mains/update/{id}',[MainsController::class,'update'])->name('mains.update');
        Route::get('/mains/delete/{id}', [MainsController::class, 'destroy'])->name('mains.delete');
        Route::get('/get_paper', [MainsController::class, 'getPaperTypes']);
        Route::get('/get_subjects', [MainsController::class, 'getSubjects']);

        //settings route
        Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
        Route::get('/setting/create',[SettingController::class,'create'])->name('setting.create');
        Route::post('/setting/store',[SettingController::class,'store'])->name('setting.store');
        Route::get('/setting/edit/{id}',[SettingController::class,'edit'])->name('setting.edit');
        Route::post('/setting/update/{id}',[SettingController::class,'update'])->name('setting.update');
        Route::get('/setting/delete/{id}', [SettingController::class, 'destroy'])->name('setting.delete');


        //Support route
        Route::get('/guidance',[GuideController::class,'index'])->name('guide.index');
        Route::get('/guide/create',[GuideController::class,'create'])->name('guide.create');
        Route::post('/guide/store',[GuideController::class,'store'])->name('guide.store');
        Route::get('/guide/edit/{id}',[GuideController::class,'edit'])->name('guide.edit');
        Route::post('/guide/update/{id}',[GuideController::class,'update'])->name('guide.update');
        Route::get('/guide/delete/{id}', [GuideController::class, 'destroy'])->name('guide.delete');


        //Support route
        Route::get('/sampleEualuation',[SampleController::class,'index'])->name('sample.index');
        Route::get('/sample/create',[SampleController::class,'create'])->name('sample.create');
        Route::post('/sample/store',[SampleController::class,'store'])->name('sample.store');
        Route::get('/sample/edit/{id}',[SampleController::class,'edit'])->name('sample.edit');
        Route::post('/sample/update/{id}',[SampleController::class,'update'])->name('sample.update');
        Route::get('/sample/delete/{id}', [SampleController::class, 'destroy'])->name('sample.delete');


        //offers

        Route::get('/offers', [OfferController::class, 'index'])->name('offer.index');
        Route::get('/offers/create', [OfferController::class, 'create'])->name('offer.create');
        Route::post('/offers', [OfferController::class, 'store'])->name('offer.store');
        Route::get('/offers/{id}/edit', [OfferController::class, 'edit'])->name('offer.edit');
        Route::post('/offers/{id}', [OfferController::class, 'update'])->name('offer.update');
        Route::get('/offers/{id}', [OfferController::class, 'destroy'])->name('offer.delete');

    });
});

Route::get('/cghome', [FrontController::class, 'index'])->name('cghome');
Route::get('/mphome', [FrontController::class, 'mphome'])->name('mphome');
Route::get('/', [FrontController::class, 'home']);
Route::get('/aboutus', [FrontController::class, 'aboutus'])->name('aboutus');
Route::get('/contact', [FrontController::class, 'contact']);
Route::get('/ourplan', [FrontController::class, 'ourplan']);
Route::get('/cgplan', [FrontController::class, 'cgplan']);
Route::get('/pyq', [FrontController::class, 'pyq']);
Route::get('/cgpyq', [FrontController::class, 'cgpyq']);
Route::get('/loginstore', [FrontController::class, 'loginstore']);
Route::get('/verifyotp', [FrontController::class, 'verifyotp']);
Route::get('/MainsPractice', [FrontController::class, 'mainsPractice']);
Route::post('/enquery', [FrontController::class, 'enquery'])->name('enquery.store');
Route::get('/get-subjects/{paperId}', [FrontController::class, 'getSubjects']);
Route::get('/answerList', [FrontController::class, 'allanswer']);
Route::post('/purchase-plan', [FrontController::class, 'purchase'])->name('purchase.plan');
Route::get('/dashboard', [FrontController::class, 'userdash'])->name('dashboard');
Route::get('/current_affair', [FrontController::class, 'currentAffair']);
Route::post('/save-user', [FrontController::class, 'signin']);

Route::get('/userCount', [FrontController::class, 'usercount'])->name('user.count');
Route::post('/submit-doubt', [FrontController::class, 'doubt'])->name('submit.doubt');
Route::get('/payment', [FrontController::class, 'payment'])->name('plan.payment');
Route::get('/usermessage', [FrontController::class, 'message'])->name('user.msg');


Route::get('/userlog', [FrontController::class, 'userlog'])->name('login');
Route::post('/send-otp', [FrontController::class, 'sendOtp'])->name('send.otp');
Route::post('/verify-otp', [FrontController::class, 'verifyOtp'])->name('verify.otp');
Route::get('/otp', [FrontController::class, 'otp'])->name('otp');
Route::get('/logout', [FrontController::class, 'logout'])->name('user.logout');
Route::get('/questionadd', [FrontController::class, 'submitquestion'])->name('user.questionadd');
Route::get('/answerForm', [FrontController::class, 'answerForm'])->name('user.answerForm');
Route::post('/answerstore', [FrontController::class, 'answerstore'])->name('user.answerstore');
Route::get('/viewCheckedSheet/{id}', [FrontController::class, 'viewCheckedSheet'])->name('user.viewCheckedSheet');
Route::post('/set-state-session', function (Illuminate\Http\Request $request) {
    Session::put('selected_state', $request->state);
    return response()->json(['success' => true]);
})->name('set.state.session');