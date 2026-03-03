<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('backend.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function globalSearch(Request $request)
    {
        $term = trim($request->input('term'));

        Log::info('Organization search term: ' . $term);

        if (!$term || strlen($term) < 2) {
            return response()->json([]);
        }

        $organizations = Organization::query()
            ->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('organization_location', 'like', "%{$term}%")
                    ->orWhere('organization_slogan', 'like', "%{$term}%")
                    ->orWhere('phone_1', 'like', "%{$term}%")
                    ->orWhere('phone_2', 'like', "%{$term}%")
                    ->orWhere('land_phone_1', 'like', "%{$term}%")
                    ->orWhere('land_phone_2', 'like', "%{$term}%");
            })
            ->latest()
            ->limit(10)
            ->get();

        $results = [];

        foreach ($organizations as $org) {
            $results[] = [
                'label' => "[Organization] {$org->name} | {$org->organization_location}",
                'url'   => route('organizations.show', $org->id), // make sure this route exists
                'group' => 'Organizations',
            ];
        }

        return response()->json($results);
    }

    protected function highlightMatch(string $text, string $term): string
    {
        if (!$term) {
            return e($text);
        }

        return preg_replace(
            "/(" . preg_quote($term, '/') . ")/i",
            '<span style="color:#ff6b6b;">$1</span>',
            e($text)
        );
    }
}
