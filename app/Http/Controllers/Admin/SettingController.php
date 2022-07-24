<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::where('type', '!=', 'map')->get();
        $lat = Setting::where('key', 'lat')->first();
        $lng = Setting::where('key', 'lng')->first();
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = 'name_' . $lang;
        $value = 'value_' . $lang;
        return view('admin.settings.index-edit', compact('settings', 'name', 'value', 'lat', 'lng'));
    }

    public function update(SettingRequest $request)
    {
        $lang = \LaravelLocalization::getCurrentLocale();
        $val = 'value_' . $lang;
        $requestData = $request->all();
        foreach($requestData as $key=>$value)
        {
            $settings = Setting::all();
            foreach ($settings as $setting) {
                if($key == 'address' || $key == 'title') {
                    $setting->where('key', $key)->update([$val => $value]);
                }else {
                    $setting->where('key', $key)->update(['value_ar' => $value, 'value_en' => $value]);
                }
            }
        }
        session()->flash('success', trans('admin.updated_successfully'));
        return back();
    }
}
