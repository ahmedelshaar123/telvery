<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaticPageRequest;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function index(){
        $staticPages = StaticPage::all();
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = 'name_' . $lang;
        $value = 'value_' . $lang;
        return view('admin.static-pages.index-edit', compact('staticPages', 'name', 'value'));
    }

    public function update(StaticPageRequest $request)
    {
        $staticPages = StaticPage::all();
        $lang = \LaravelLocalization::getCurrentLocale();
        $val = 'value_' . $lang;
        $requestData = $request->all();

        foreach($requestData as $key=>$value)
        {
            foreach ($staticPages as $staticPage) {
                $staticPage->where('key', $key)->update([$val => $value]);
            }
        }
        session()->flash('success', trans('admin.updated_successfully'));
        return back();
    }
}
