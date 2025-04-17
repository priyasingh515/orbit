<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function index(){
        $aboutus = About::all();
        return view('admin.About.index',compact('aboutus'));
    }

    public function create(){
        return view('admin.About.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post = About::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('about.index')->with('success', 'About Add successfully!');
    }

    public function edit($id){
          $aboutus = About::find($id);
        return view('admin.About.edit',compact('aboutus'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $about->update($request->all());

        // return response()->json(['message' => 'Post updated successfully', 'post' => $post]);

        return redirect()->route('about.index')->with('success', 'About Updated successfully!');

    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About deleted successfully!');

    }
}
