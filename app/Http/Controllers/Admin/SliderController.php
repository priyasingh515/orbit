<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    //

    public function index(){
        $Sliders = Slider::all();
        return view('admin.Slider.index',compact('Sliders'));
    }

    public function create(){
        return view('admin.Slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'paragraph' => 'nullable|string|max:1000',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin/sliders'), $imageName);
        }

        Slider::create([
            'heading' => $request->heading,
            'paragraph' => $request->paragraph,
            'image' => $imageName ?? null,
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider created successfully!');
    }

    public function edit($id){
        $sliders = Slider::find($id);
        return view('admin.Slider.edit',compact('sliders'));

    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'heading' => 'nullable|string|max:255',
            'paragraph' => 'nullable|string|max:1000',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = $slider->image;

        if ($request->hasFile('image')) {
   
            $oldImagePath = public_path('admin/sliders/'.$slider->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin/sliders'), $imageName);
        }

        $slider->update([
            'heading' => $request->heading,
            'paragraph' => $request->paragraph,
            'image' => $imageName,
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy($id)
    {
        $sliders = Slider::find($id);

        if (!$sliders) {
            return redirect()->route('slider.index')->with('error', 'Slider not found!');
        }

        $imagePath = public_path('admin/sliders/' . $sliders->image);
        if ($sliders->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $sliders->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully!');
    }

}
