<?php


namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use App\Models\SubProjectSection;
use App\Models\ProjectSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubProjectSectionController extends Controller
{
    public function index()
    {
        $data = SubProjectSection::latest()->get();
        return view('backend.sub_project_sections.index', compact('data'));
    }

    public function create()
    {
        $projects = ProjectSection::pluck('title', 'id');
        return view('backend.sub_project_sections.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:project_sections,id',
            'title' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // 📁 Dynamic folder per project
        $folder = public_path('uploads/images/welcome_page/projects/project_' . $request->project_id);

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            // 🔥 Unique sub image naming
            $filename = time() . '_sub.' . $image->getClientOriginalExtension();

            $image->move($folder, $filename);

            $imagePath = 'uploads/images/welcome_page/projects/project_'
                . $request->project_id . '/' . $filename;
        }

        SubProjectSection::create([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'image' => $imagePath,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('sub_project_sections.index')
            ->with('success', 'Sub Project Created Successfully');
    }

    public function show($id)
    {
        $item = SubProjectSection::with('project')->findOrFail($id);

        return view('backend.sub_project_sections.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SubProjectSection::findOrFail($id);
        $projects = ProjectSection::pluck('title', 'id');

        return view('backend.sub_project_sections.edit', compact('item', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $item = SubProjectSection::findOrFail($id);

        $request->validate([
            'project_id' => 'required|exists:project_sections,id',
            'title' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = $item->image;

        // 📁 New folder (if project changed)
        $folder = public_path('uploads/images/welcome_page/projects/project_' . $request->project_id);

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        if ($request->hasFile('image')) {

            // ❌ delete old image
            if ($item->image && File::exists(public_path($item->image))) {
                File::delete(public_path($item->image));
            }

            $image = $request->file('image');

            $filename = time() . '_sub.' . $image->getClientOriginalExtension();

            $image->move($folder, $filename);

            $imagePath = 'uploads/images/welcome_page/projects/project_'
                . $request->project_id . '/' . $filename;
        }

        $item->update([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'image' => $imagePath,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('sub_project_sections.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $item = SubProjectSection::findOrFail($id);

        if ($item->image && File::exists(public_path($item->image))) {
            File::delete(public_path($item->image));
        }

        $item->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
