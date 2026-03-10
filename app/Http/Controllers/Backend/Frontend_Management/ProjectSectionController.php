<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectSection;
use Illuminate\Support\Facades\File;

class ProjectSectionController extends Controller
{

    public function index()
    {
        $projects = ProjectSection::latest()->get();
        return view('backend.project_sections.index', compact('projects'));
    }

    public function create()
    {
        return view('backend.project_sections.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $folder = public_path('uploads/images/welcome_page/projects');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . '_project.' . $image->getClientOriginalExtension();
            $image->move($folder, $filename);

            $imagePath = 'uploads/images/welcome_page/projects/' . $filename;
        }

        ProjectSection::create([
            'title' => $request->title,
            'category' => $request->category,
            'status' => $request->status,
            'image' => $imagePath
        ]);

        return redirect()->route('project_sections.index')
            ->with('success', 'Project Created Successfully');
    }

    public function show(string $id)
    {
        $project = ProjectSection::findOrFail($id);
        return view('backend.project_sections.show', compact('project'));
    }

    public function edit(string $id)
    {
        $project = ProjectSection::findOrFail($id);
        return view('backend.project_sections.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {

        $project = ProjectSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = $project->image;

        $folder = public_path('uploads/images/welcome_page/projects');

        if ($request->hasFile('image')) {

            if ($project->image && File::exists(public_path($project->image))) {
                File::delete(public_path($project->image));
            }

            $image = $request->file('image');
            $filename = time() . '_project.' . $image->getClientOriginalExtension();
            $image->move($folder, $filename);

            $imagePath = 'uploads/images/welcome_page/projects/' . $filename;
        }

        $project->update([
            'title' => $request->title,
            'category' => $request->category,
            'status' => $request->status,
            'image' => $imagePath
        ]);

        return redirect()->route('project_sections.index')
            ->with('success', 'Project Updated Successfully');
    }

    public function destroy(string $id)
    {

        $project = ProjectSection::findOrFail($id);

        if ($project->image && File::exists(public_path($project->image))) {
            File::delete(public_path($project->image));
        }

        $project->delete();

        return redirect()->route('project_sections.index')
            ->with('success', 'Project Deleted Successfully');
    }
}
