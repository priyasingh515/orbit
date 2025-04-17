<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supports;
use Illuminate\Support\Facades\File;

class GuideController extends Controller
{
    //


    public function index(){
        $Guides = Supports::all();
        return view('admin.Guide.index',compact('Guides'));
    }

    public function create(){
        return view('admin.Guide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'post' => 'nullable|string|max:1000',
            'rank' => 'nullable|string|max:1000',
            'photos' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photos')) {
            $image = $request->file('photos');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin/guide'), $imageName);
        }

        Supports::create([
            'name' => $request->name, 
            'post' => $request->post,
            'rank' => $request->rank,
            'photos' => $imageName ?? null,
        ]);

        return redirect()->route('guide.index')->with('success', 'Supperter created successfully!');
    }

    public function edit($id){
        $guidesData = Supports::find($id); 
        return view('admin.Guide.edit',compact('guidesData'));

    }

    public function update(Request $request, $id)
    {
        $guidesData = Supports::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'post' => 'nullable|string|max:1000',
            'rank' => 'nullable|string|max:1000',
            'photos' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = $guidesData->photos;

        if ($request->hasFile('photos')) {
   
            $oldImagePath = public_path('admin/guide/'.$guidesData->photos);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $image = $request->file('photos');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin/guide'), $imageName);
        }

        $guidesData->update([
            'name' => $request->name,
            'post' => $request->post,
            'rank' => $request->rank,
            'photos' => $imageName,
        ]);

        return redirect()->route('guide.index')->with('success', 'Supporter updated successfully!');
    }

    public function destroy($id)
    {
        $Guides = Supports::find($id);

        if (!$Guides) {
            return redirect()->route('guide.index')->with('error', 'Supporter not found!');
        }

        $imagePath = public_path('admin/guide/' . $Guides->photos);
        if ($Guides->photos && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $Guides->delete();

        return redirect()->route('guide.index')->with('success', 'Supporter deleted successfully!');
    }
}
