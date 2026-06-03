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
        $data = SubProjectSection::with('project')
            ->get()
            ->groupBy(function ($item) {
                return $item->project_id . '_' . $item->title;
            });

        return view(
            'backend.sub_project_sections.index',
            compact('data')
        );
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

            'image' => 'required|array|min:1',
            'image.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

            'titles' => 'nullable|array',
            'titles.*' => 'nullable|string|max:255',

            'is_active' => 'nullable|boolean',
        ]);

        $folder = public_path(
            'uploads/images/welcome_page/projects/project_' .
                $request->project_id
        );

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        foreach ($request->file('image') as $index => $image) {

            $filename =
                time() .
                '_' .
                uniqid() .
                '.' .
                $image->getClientOriginalExtension();

            $image->move($folder, $filename);

            $imagePath =
                'uploads/images/welcome_page/projects/project_' .
                $request->project_id .
                '/' .
                $filename;

            SubProjectSection::create([

                'project_id' => $request->project_id,

                'title' => $request->titles[$index] ?? null,

                'image' => $imagePath,

                'is_active' => $request->is_active ?? 1,

            ]);
        }

        return redirect()
            ->route('sub_project_sections.index')
            ->with(
                'success',
                'Sub Project Images Uploaded Successfully'
            );
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
            'title'      => 'nullable|string|max:255',
            'is_active'  => 'nullable|boolean',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $item->image;

        $folder = public_path(
            'uploads/images/welcome_page/projects/project_' .
                $request->project_id
        );

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        if ($request->hasFile('image')) {

            if (
                $item->image &&
                File::exists(public_path($item->image))
            ) {
                File::delete(public_path($item->image));
            }

            $image = $request->file('image');

            $filename =
                time() .
                '_' .
                uniqid() .
                '.' .
                $image->getClientOriginalExtension();

            $image->move($folder, $filename);

            $imagePath =
                'uploads/images/welcome_page/projects/project_' .
                $request->project_id .
                '/' .
                $filename;
        }

        $item->update([
            'project_id' => $request->project_id,
            'title'      => $request->title,
            'image'      => $imagePath,
            'is_active'  => $request->is_active ?? 1,
        ]);

        return redirect()
            ->route('sub_project_sections.index')
            ->with(
                'success',
                'Sub Project Gallery Updated Successfully'
            );
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
