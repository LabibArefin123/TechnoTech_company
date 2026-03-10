<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsSection;

class NewsSectionController extends Controller
{

    public function index()
    {
        $sections = NewsSection::latest()->get();
        return view('backend.news_sections.index', compact('sections'));
    }


    public function create()
    {
        return view('backend.news_sections.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255'
        ]);

        NewsSection::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle
        ]);

        return redirect()->route('news_sections.index')
            ->with('success', 'News Section Created Successfully');
    }


    public function show(string $id)
    {
        $section = NewsSection::findOrFail($id);
        return view('backend.news_sections.show', compact('section'));
    }


    public function edit(string $id)
    {
        $section = NewsSection::findOrFail($id);
        return view('backend.news_sections.edit', compact('section'));
    }


    public function update(Request $request, string $id)
    {

        $section = NewsSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255'
        ]);

        $section->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle
        ]);

        return redirect()->route('news_sections.index')
            ->with('success', 'News Section Updated Successfully');
    }


    public function destroy(string $id)
    {

        $section = NewsSection::findOrFail($id);
        $section->delete();

        return redirect()->route('news_sections.index')
            ->with('success', 'News Section Deleted Successfully');
    }
}
