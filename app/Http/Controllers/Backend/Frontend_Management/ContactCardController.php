<?php

namespace App\Http\Controllers\Backend\Frontend_Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = ContactCard::latest()->get();

        return view('backend.contact_cards.index', compact('cards'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact_cards.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'type'  => 'required|in:email,phone,address',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $folder = public_path('uploads/images/frontend/contact_page/contact_card');

            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $filename = time() . '_contact_card.' . $image->getClientOriginalExtension();

            $image->move($folder, $filename);

            $imagePath = 'uploads/images/frontend/contact_page/contact_card/' . $filename;
        }


        ContactCard::create([
            'title' => $request->title,
            'value' => $request->value,
            'type'  => $request->type,
            'status' => $request->status,
            'image' => $imagePath
        ]);


        return redirect()->route('contact_cards.index')
            ->with('success', 'Contact Card created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $card = ContactCard::findOrFail($id);

        return view('backend.contact_cards.show', compact('card'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $card = ContactCard::findOrFail($id);

        return view('backend.contact_cards.edit', compact('card'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $card = ContactCard::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'type'  => 'required|in:email,phone,address',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = $card->image;


        if ($request->hasFile('image')) {

            if ($card->image && File::exists(public_path($card->image))) {
                File::delete(public_path($card->image));
            }

            $image = $request->file('image');

            $folder = public_path('uploads/images/frontend/contact_page/contact_card');

            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $filename = time() . '_contact_card.' . $image->getClientOriginalExtension();

            $image->move($folder, $filename);

            $imagePath = 'uploads/images/frontend/contact_page/contact_card/' . $filename;
        }


        $card->update([
            'title' => $request->title,
            'value' => $request->value,
            'type'  => $request->type,
            'status' => $request->status,
            'image' => $imagePath
        ]);


        return redirect()->route('contact_cards.index')
            ->with('success', 'Contact Card updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $card = ContactCard::findOrFail($id);

        if ($card->image && File::exists(public_path($card->image))) {

            File::delete(public_path($card->image));
        }

        $card->delete();


        return redirect()->route('contact_cards.index')
            ->with('success', 'Contact Card deleted successfully.');
    }
}
