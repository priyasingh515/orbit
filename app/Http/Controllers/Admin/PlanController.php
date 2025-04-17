<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plans;
use DB;

class PlanController extends Controller
{
    //

    public function index(){
        // $plansData = Plans::all();
        $plansData = Plans::orderBy('id', 'desc')->get();
        return view('admin.Plans.index',compact('plansData'));
    }

    public function create(){
        return view('admin.Plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_validity' => 'required|string|max:100',
            'medium' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description_1' => 'nullable|string',
            'description_2' => 'nullable|string',
            'description_3' => 'nullable|string',
            'description_4' => 'nullable|string',
            'state' => 'required',
        ]);

        Plans::create($request->all());

        return redirect()->route('plan.index')->with('success', 'Plan Created Successfully!');
    }

    public function edit($id){
        $plans = Plans::find($id);
        return view('admin.Plans.edit',compact('plans'));
    }


    public function update(Request $request,$id)
    {
        
        $plans = Plans::findOrFail($id);
        $plans->update($request->all());

        return redirect()->route('plan.index')->with('success', 'Plan Updated Successfully!');
    }

    public function destroy($id)
    {
        $plans = Plans::findOrFail($id);
        $plans->delete();

        return redirect()->route('plan.index')->with('success', 'Plan deleted successfully!');

    }

    public function pendingPlan(){
    
        $pendingPlans = DB::table('user_plans')
            ->leftJoin('users', 'user_plans.user_id', '=', 'users.id')
            ->leftJoin('plans','plans.id','=','user_plans.plan_id') 
            ->leftJoin('cg_district','users.district','=','cg_district.id') 
            ->leftJoin('mp_district','users.district','=','mp_district.id') 
            ->where('user_plans.status', 'pending') 
            ->select(
                'user_plans.*', 
                'users.name as user_name',
                'users.phone as mobile',
                'users.district as district',
                'users.email as email',
                'plans.plan_name as plan_name',
                'plans.price as price',
                'cg_district.name as cg_district_name',
                'mp_district.name as mp_district_name',
                )
            ->get();
            $pendingPlans->transform(function($plan) {
                if ($plan->state === 'cg') {
                    $plan->district = $plan->cg_district_name;
                } elseif ($plan->state === 'mp') {
                    $plan->district = $plan->mp_district_name;
                } else {
                    $plan->district = 'Unknown';
                }
                return $plan;
            });
        return view('admin.Plans.pending_plan',compact('pendingPlans'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'plan_id' => 'required',
            'status' => 'required',
        ]);
        DB::table('user_plans')->where('id', $request->plan_id)->update([
            'status' => $request->status
        ]);

        return response()->json(['message' => 'Plan status updated successfully!']);
    }

    public function purchasePlan()
{
    $purchasePlans = DB::table('user_plans')
        ->leftJoin('users', 'user_plans.user_id', '=', 'users.id')
        ->leftJoin('plans','plans.id','=','user_plans.plan_id')
        ->leftJoin('cg_district','users.district','=','cg_district.id') 
        ->leftJoin('mp_district','users.district','=','mp_district.id') 
        ->where('user_plans.status', 'active') 
        ->select(
            'user_plans.*',
            'users.name as user_name',
            'users.phone as mobile',
            'users.state as state',
            'users.email as email',
            'cg_district.name as cg_district_name',
            'mp_district.name as mp_district_name',
            'plans.plan_name as plan_name',
            'plans.price as price'
        )
        ->get();

    // Set correct district based on state
    $purchasePlans->transform(function($plan) {
        if ($plan->state === 'cg') {
            $plan->district = $plan->cg_district_name;
        } elseif ($plan->state === 'mp') {
            $plan->district = $plan->mp_district_name;
        } else {
            $plan->district = 'Unknown';
        }
        return $plan;
    });

    return view('admin.Plans.purchase_list', compact('purchasePlans'));
}


    public function purchasedestroy($id)
    {
        DB::table('user_plans')->where('id', $id)->delete();
        return redirect()->route('plan.purchase')->with('success', 'Deleted successfully!');
    }

    public function pendingdestroy($id)
    {
        DB::table('user_plans')->where('id', $id)->delete();
        return redirect()->route('plan.pending')->with('success', 'Deleted successfully!');
    }
}
