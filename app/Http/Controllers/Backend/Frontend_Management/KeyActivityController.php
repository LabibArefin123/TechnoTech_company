<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KeyActivity;
use Illuminate\Support\Facades\File;

class KeyActivityController extends Controller
{

    public function index()
    {
        $activities = KeyActivity::orderBy('serial')->latest()->get();
        return view('backend.key_activities.index', compact('activities'));
    }


    public function create()
    {
        return view('backend.key_activities.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'serial' => 'nullable|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean'
        ]);

        $folder = public_path('uploads/images/welcome_page/key_activities');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {

            $img = $request->file('image');
            $name = time() . '_activity.' . $img->getClientOriginalExtension();

            $img->move($folder, $name);

            $imagePath = 'uploads/images/welcome_page/key_activities/' . $name;
        }

        KeyActivity::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'serial' => $request->serial ?? 0,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return redirect()->route('key_activities.index')
            ->with('success', 'Key Activity Created Successfully');
    }


    public function show(string $id)
    {
        $activity = KeyActivity::findOrFail($id);

        return view('backend.key_activities.show', compact('activity'));
    }


    public function edit(string $id)
    {
        $activity = KeyActivity::findOrFail($id);

        return view('backend.key_activities.edit', compact('activity'));
    }


    public function update(Request $request, string $id)
    {

        $activity = KeyActivity::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'serial' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean'
        ]);

        $folder = public_path('uploads/images/welcome_page/key_activities');

        $imagePath = $activity->image;

        if ($request->hasFile('image')) {

            if ($activity->image && File::exists(public_path($activity->image))) {
                File::delete(public_path($activity->image));
            }

            $img = $request->file('image');
            $name = time() . '_activity.' . $img->getClientOriginalExtension();

            $img->move($folder, $name);

            $imagePath = 'uploads/images/welcome_page/key_activities/' . $name;
        }

        $activity->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'serial' => $request->serial ?? 0,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return redirect()->route('key_activities.index')
            ->with('success', 'Key Activity Updated Successfully');
    }


    public function destroy(string $id)
    {
        $activity = KeyActivity::findOrFail($id);

        if ($activity->image && File::exists(public_path($activity->image))) {
            File::delete(public_path($activity->image));
        }

        $activity->delete();

        return redirect()->route('key_activities.index')
            ->with('success', 'Key Activity Deleted Successfully');
    }
}
