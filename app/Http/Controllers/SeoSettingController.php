<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoSetting;

class SeoSettingController extends Controller
{
    public function index()
    {
        $seo = SeoSetting::first();
        return view('backend.seo_section.index', compact('seo'));
    }

    public function update(Request $request)
    {

        $seo = SeoSetting::first() ?? new SeoSetting();

        $seo->meta_title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->og_title = $request->og_title;
        $seo->og_description = $request->og_description;
        $seo->save();

        return back()->with('success', 'SEO Updated Successfully');
    }
}
