<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\File;

class AboutSectionController extends Controller
{

    public function index()
    {
        $abouts = AboutSection::latest()->get();
        return view('backend.about_sections.index', compact('abouts'));
    }

    public function create()
    {
        return view('backend.about_sections.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',

            'paragraph_1' => 'required',
            'paragraph_2' => 'nullable',
            'paragraph_3' => 'nullable',

            'mission_title' => 'required|string|max:255',
            'mission_text' => 'required',

            'vision_title' => 'required|string|max:255',
            'vision_text' => 'required',

            'image_1' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' => 'required|boolean'
        ]);

        $folder = public_path('uploads/images/welcome_page/about');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $image1Path = null;
        $image2Path = null;

        if ($request->hasFile('image_1')) {
            $img1 = $request->file('image_1');
            $name1 = time() . '_about1.' . $img1->getClientOriginalExtension();
            $img1->move($folder, $name1);
            $image1Path = 'uploads/images/welcome_page/about/' . $name1;
        }

        if ($request->hasFile('image_2')) {
            $img2 = $request->file('image_2');
            $name2 = time() . '_about2.' . $img2->getClientOriginalExtension();
            $img2->move($folder, $name2);
            $image2Path = 'uploads/images/welcome_page/about/' . $name2;
        }

        AboutSection::create([

            'title' => $request->title,
            'tagline' => $request->tagline,

            'paragraph_1' => $request->paragraph_1,
            'paragraph_2' => $request->paragraph_2,
            'paragraph_3' => $request->paragraph_3,

            'mission_title' => $request->mission_title,
            'mission_text' => $request->mission_text,

            'vision_title' => $request->vision_title,
            'vision_text' => $request->vision_text,

            'image_1' => $image1Path,
            'image_2' => $image2Path,

            'status' => $request->status

        ]);

        return redirect()->route('about_sections.index')
            ->with('success', 'About Section Created Successfully');
    }

    public function show(string $id)
    {
        $about = AboutSection::findOrFail($id);
        return view('backend.about_sections.show', compact('about'));
    }

    public function edit(string $id)
    {
        $about = AboutSection::findOrFail($id);
        return view('backend.about_sections.edit', compact('about'));
    }

    public function update(Request $request, string $id)
    {

        $about = AboutSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',

            'paragraph_1' => 'required',
            'paragraph_2' => 'nullable',
            'paragraph_3' => 'nullable',

            'mission_title' => 'required|string|max:255',
            'mission_text' => 'required',

            'vision_title' => 'required|string|max:255',
            'vision_text' => 'required',

            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' => 'required|boolean'
        ]);

        $folder = public_path('uploads/images/welcome_page/about');

        $image1Path = $about->image_1;
        $image2Path = $about->image_2;

        if ($request->hasFile('image_1')) {

            if ($about->image_1 && File::exists(public_path($about->image_1))) {
                File::delete(public_path($about->image_1));
            }

            $img1 = $request->file('image_1');
            $name1 = time() . '_about1.' . $img1->getClientOriginalExtension();
            $img1->move($folder, $name1);

            $image1Path = 'uploads/images/welcome_page/about/' . $name1;
        }

        if ($request->hasFile('image_2')) {

            if ($about->image_2 && File::exists(public_path($about->image_2))) {
                File::delete(public_path($about->image_2));
            }

            $img2 = $request->file('image_2');
            $name2 = time() . '_about2.' . $img2->getClientOriginalExtension();
            $img2->move($folder, $name2);

            $image2Path = 'uploads/images/welcome_page/about/' . $name2;
        }

        $about->update([

            'title' => $request->title,
            'tagline' => $request->tagline,

            'paragraph_1' => $request->paragraph_1,
            'paragraph_2' => $request->paragraph_2,
            'paragraph_3' => $request->paragraph_3,

            'mission_title' => $request->mission_title,
            'mission_text' => $request->mission_text,

            'vision_title' => $request->vision_title,
            'vision_text' => $request->vision_text,

            'image_1' => $image1Path,
            'image_2' => $image2Path,

            'status' => $request->status

        ]);

        return redirect()->route('about_sections.index')
            ->with('success', 'About Section Updated Successfully');
    }

    public function destroy(string $id)
    {
        $about = AboutSection::findOrFail($id);

        if ($about->image_1 && File::exists(public_path($about->image_1))) {
            File::delete(public_path($about->image_1));
        }

        if ($about->image_2 && File::exists(public_path($about->image_2))) {
            File::delete(public_path($about->image_2));
        }

        $about->delete();

        return redirect()->route('about_sections.index')
            ->with('success', 'About Section Deleted Successfully');
    }
}
