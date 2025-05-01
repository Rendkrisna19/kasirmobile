<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSetting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = UserSetting::first();
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'home_address' => 'nullable|string|max:255',
            'business_address' => 'nullable|string|max:255',
            'shopping_center' => 'nullable|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'brand_bg_color' => 'nullable|string|max:7',
            'brand_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $setting = UserSetting::first() ?? new UserSetting();
        $setting->fill($request->except('brand_logo'));

        if ($request->hasFile('brand_logo')) {
            $path = $request->file('brand_logo')->store('logos', 'public');
            $setting->brand_logo = $path;
        }

        $setting->save();

        return redirect()->route('settings.edit')->with('success', 'Settings updated!');
    }
}
    