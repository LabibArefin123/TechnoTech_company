<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {

        $news = News::latest()->get();
        return view('backend.news.index', compact('news'));
    }


    public function create()
    {

        return view('backend.news.create');
    }


    public function store(Request $request)
    {

        $request->validate([

            'category' => 'required|string|max:255',

            'title' => 'required|string|max:255',

            'description' => 'nullable',

            'video_url' => 'nullable|string',

            'author' => 'nullable|string|max:255',

            'news_date' => 'nullable|date',

            'type' => 'required|in:featured,list',

            'status' => 'required|boolean'

        ]);


        News::create([

            'category' => $request->category,

            'title' => $request->title,

            'description' => $request->description,

            'video_url' => $request->video_url,

            'author' => $request->author,

            'news_date' => $request->news_date,

            'type' => $request->type,

            'status' => $request->status

        ]);


        return redirect()->route('news.index')
            ->with('success', 'News Created Successfully');
    }


    public function show(string $id)
    {

        $news = News::findOrFail($id);
        return view('backend.news.show', compact('news'));
    }


    public function edit(string $id)
    {

        $news = News::findOrFail($id);
        return view('backend.news.edit', compact('news'));
    }


    public function update(Request $request, string $id)
    {

        $news = News::findOrFail($id);

        $request->validate([

            'category' => 'required|string|max:255',

            'title' => 'required|string|max:255',

            'description' => 'nullable',

            'video_url' => 'nullable|string',

            'author' => 'nullable|string|max:255',

            'news_date' => 'nullable|date',

            'type' => 'required|in:featured,list',

            'status' => 'required|boolean'

        ]);


        $news->update([

            'category' => $request->category,

            'title' => $request->title,

            'description' => $request->description,

            'video_url' => $request->video_url,

            'author' => $request->author,

            'news_date' => $request->news_date,

            'type' => $request->type,

            'status' => $request->status

        ]);


        return redirect()->route('news.index')
            ->with('success', 'News Updated Successfully');
    }


    public function destroy(string $id)
    {

        $news = News::findOrFail($id);

        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'News Deleted Successfully');
    }
}
