<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{
    //

    public function index(){

        $SettingData = Settings::get();
        return view('admin.settings.index',compact('SettingData'));
    }
    public function create(){
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'required',
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $bannerName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/banners'), $bannerName);
            $bannerPath = 'admin/banners/' . $bannerName;
        }

        Settings::create([
            'mobile' => $request->mobile,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'banner' => $bannerPath ?? null,
            'heading' => $request->heading,
        ]);

        return redirect()->route('setting.index')->with('success', 'Record Created Successfully!');
    }

    public function edit($id){
        $settings = Settings::find($id);
        return view('admin.settings.edit',compact('settings'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'mobile' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'required',
        ]);

        $record = Settings::findOrFail($id);

        if ($request->hasFile('banner')) {
            if ($record->banner && file_exists(public_path($record->banner))) {
                unlink(public_path($record->banner));
            }
            $file = $request->file('banner');
            $bannerName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admin/banners'), $bannerName);
            $record->banner = 'admin/banners/' . $bannerName;
        }

        $record->mobile = $request->mobile;
        $record->email = $request->email;
        $record->whatsapp = $request->whatsapp;
        $record->heading = $request->heading;
        $record->save();

        return redirect()->route('setting.index')->with('success', 'Record Updated Successfully!');
    }
}
