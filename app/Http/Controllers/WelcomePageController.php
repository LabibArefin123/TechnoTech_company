<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\FrontendSetting;
use App\Models\AboutSection;
use App\Models\ContactCard;
use App\Models\ProjectSection;
use App\Models\SystemProblem;
use App\Models\KeyActivity;
use App\Models\News;
use App\Models\NewsSection;
use App\Models\SkillSection;
use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WelcomePageController extends Controller
{
    public function index()
    {
        $about = AboutSection::where('status', 1)->first();
        $projects = ProjectSection::where('status', 1)->get();
        $newsSection = NewsSection::first();

        $featuredNews = News::where('type', 'featured')
            ->where('status', 1)
            ->latest()
            ->first();

        $listNews = News::where('type', 'list')
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $activities = KeyActivity::where('status', 1)
            ->orderBy('serial')
            ->get();


        $skillSection = SkillSection::where('status', 1)->orderBy('serial')->get();

        $setting = FrontendSetting::first();

        return view('frontend.welcome', compact(
            'about',
            'projects',
            'newsSection',
            'featuredNews',
            'listNews',
            'activities',
            'skillSection',
            'setting'
        ));
    }

    public function contact()
    {
        $cards = ContactCard::where('status', 1)->get();

        return view('frontend.contact', compact('cards'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you! Your message has been sent.');
    }

    public function system_problem_store(Request $request)
    {
        $request->validate([
            'problem_title' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'status' => 'required|in:low,medium,high,critical',
            'problem_file' => 'nullable|file|max:4096',
            'multiple_images.*' => 'nullable|image|max:4096',
            'multiple_pdfs.*' => 'nullable|file|max:4096',
        ]);

        $uid = 'TECH-PROB-' . strtoupper(Str::random(6));

        // SINGLE FILE
        $fileName = null;
        if ($request->hasFile('problem_file')) {
            $file = $request->file('problem_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/problem/files'), $fileName);
        }

        // MULTIPLE IMAGES
        $images = [];
        if ($request->hasFile('multiple_images')) {
            foreach ($request->file('multiple_images') as $img) {
                $name = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('uploads/problem/images'), $name);
                $images[] = $name;
            }
        }

        // MULTIPLE FILES
        $files = [];
        if ($request->hasFile('multiple_pdfs')) {
            foreach ($request->file('multiple_pdfs') as $f) {
                $name = time() . '_' . $f->getClientOriginalName();
                $f->move(public_path('uploads/problem/files'), $name);
                $files[] = $name;
            }
        }

        SystemProblem::create([
            'problem_uid' => $uid,
            'problem_title' => $request->problem_title,
            'problem_description' => $request->problem_description,
            'status' => $request->status,
            'problem_file' => $fileName,
            'multiple_images' => $images,
            'multiple_pdfs' => $files,
        ]);

        return back()->with('success', '✅ Problem submitted successfully!');
    }
    
    public function updateSettings(Request $request)
    {
        $setting = FrontendSetting::first() ?? new FrontendSetting();

        $setting->theme_color   = $request->input('theme_color', $setting->theme_color);
        $setting->text_size     = $request->input('text_size', $setting->text_size);

        $setting->navbar_layout = $request->input('navbar_layout', $setting->navbar_layout ?? 1);
        $setting->about_layout  = $request->input('about_layout', $setting->about_layout ?? 1);
        $setting->footer_layout = $request->input('footer_layout', $setting->footer_layout ?? 1);

        $setting->animations  = (int) $request->input('animations', 0);
        $setting->back_to_top = (int) $request->input('back_to_top', 0);
        $setting->dark_mode   = (int) $request->input('dark_mode', 0);

        $setting->save();

        return response()->json([
            'status' => true,
            'message' => 'Settings updated successfully',
            'data' => $setting
        ]);
    }
}
