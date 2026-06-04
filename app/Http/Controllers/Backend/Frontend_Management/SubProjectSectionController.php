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
            ->orderBy('project_id')
            ->get()
            ->groupBy('project_id');

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
        $item = SubProjectSection::with('project')
            ->findOrFail($id);

        $galleryItems = SubProjectSection::where(
            'project_id',
            $item->project_id
        )->get();

        return view(
            'backend.sub_project_sections.show',
            compact(
                'item',
                'galleryItems'
            )
        );
    }

    public function edit($id)
    {
        $item = SubProjectSection::findOrFail($id);
        $projects = ProjectSection::pluck('title', 'id');
        $galleryItems = SubProjectSection::where(
            'project_id',
            $item->project_id
        )->get();
        return view('backend.sub_project_sections.edit', compact('item', 'projects', 'galleryItems'));
    }


    public function update(Request $request, $id)
    {
        $item = SubProjectSection::findOrFail($id);

        $request->validate([
            'project_id' => 'required|exists:project_sections,id',
            'is_active'  => 'nullable|boolean',
        ]);

        $galleryItems = SubProjectSection::where(
            'project_id',
            $item->project_id
        )->get();

        foreach ($galleryItems as $gallery) {

            // Update title
            if (isset($request->titles[$gallery->id])) {

                $gallery->title =
                    $request->titles[$gallery->id];
            }

            // Replace image
            if (
                $request->hasFile("images.$gallery->id")
            ) {

                $folder = public_path(
                    'uploads/images/welcome_page/projects/project_' .
                        $request->project_id
                );

                if (!File::exists($folder)) {

                    File::makeDirectory(
                        $folder,
                        0755,
                        true
                    );
                }

                // delete old image
                if (
                    $gallery->image &&
                    File::exists(
                        public_path($gallery->image)
                    )
                ) {

                    File::delete(
                        public_path($gallery->image)
                    );
                }

                $image =
                    $request->file(
                        "images.$gallery->id"
                    );

                $filename =
                    time() .
                    '_' .
                    uniqid() .
                    '.' .
                    $image->getClientOriginalExtension();

                $image->move(
                    $folder,
                    $filename
                );

                $gallery->image =
                    'uploads/images/welcome_page/projects/project_' .
                    $request->project_id .
                    '/' .
                    $filename;
            }

            $gallery->project_id =
                $request->project_id;

            $gallery->is_active =
                $request->is_active ?? 1;

            $gallery->save();
            // dd($request->all(), $request->file('images'));
        }

        return redirect()
            ->route('sub_project_sections.index')
            ->with(
                'success',
                'Project Gallery Updated Successfully'
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
