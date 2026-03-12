<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillSection;
use Illuminate\Support\Facades\File;

class SkillSectionController extends Controller
{

    public function index()
    {
        $skills = SkillSection::orderBy('serial')->get();
        return view('backend.skill_sections.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.skill_sections.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'name' => 'required|string|max:255',
            'percent' => 'required|integer|min:0|max:100',
            'serial' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $folder = public_path('uploads/images/welcome_page/skill');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '_skill.' . $image->getClientOriginalExtension();
            $image->move($folder, $filename);

            $imagePath = 'uploads/images/welcome_page/skill/' . $filename;
        }

        SkillSection::create([

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath,

            'name' => $request->name,
            'percent' => $request->percent,

            'serial' => $request->serial,
            'status' => $request->status
        ]);

        return redirect()->route('skill_sections.index')
            ->with('success', 'Skill Created Successfully');
    }

    public function show($id)
    {
        $skill = SkillSection::findOrFail($id);
        return view('backend.skill_sections.show', compact('skill'));
    }

    public function edit($id)
    {
        $skill = SkillSection::findOrFail($id);
        return view('backend.skill_sections.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {

        $skill = SkillSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'name' => 'required|string|max:255',
            'percent' => 'required|integer|min:0|max:100',
            'serial' => 'required|integer',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = $skill->image;

        $folder = public_path('uploads/images/welcome_page/skill');

        if ($request->hasFile('image')) {

            if ($skill->image && File::exists(public_path($skill->image))) {
                File::delete(public_path($skill->image));
            }

            $image = $request->file('image');
            $filename = time() . '_skill.' . $image->getClientOriginalExtension();
            $image->move($folder, $filename);

            $imagePath = 'uploads/images/welcome_page/skill/' . $filename;
        }

        $skill->update([

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath,

            'name' => $request->name,
            'percent' => $request->percent,

            'serial' => $request->serial,
            'status' => $request->status
        ]);

        return redirect()->route('skill_sections.index')
            ->with('success', 'Skill Updated Successfully');
    }

    public function destroy($id)
    {

        $skill = SkillSection::findOrFail($id);

        if ($skill->image && File::exists(public_path($skill->image))) {
            File::delete(public_path($skill->image));
        }

        $skill->delete();

        return redirect()->route('skill_sections.index')
            ->with('success', 'Skill Deleted Successfully');
    }
}
