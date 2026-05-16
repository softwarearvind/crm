<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if(!$setting)
        {
            $setting = new Setting();
        }

        $logoName = $setting->logo ?? null;

        if($request->hasFile('logo'))
        {
            $logoName = time().'.'.$request->logo->extension();

            $request->logo->move(
                public_path('uploads/settings'),
                $logoName
            );
        }

        $setting->site_name = $request->site_name;
        $setting->logo = $logoName;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->footer_text = $request->footer_text;
        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;

        $setting->save();

        return redirect()
            ->back()
            ->with('success','Settings Updated Successfully');
    }
}
