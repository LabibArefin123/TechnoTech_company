<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\ProjectSection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $totalActiveProject = ProjectSection::count();
        return view('backend.dashboard', compact('totalActiveProject'));
    }

    public function system_index()
    {
        // -----------------------------
        // Total Users
        // -----------------------------
        $totalUsers = User::count();

        // -----------------------------
        // Table Row Counts + Last Updated Time
        // -----------------------------
        $dbName = DB::getDatabaseName();

        $tables = DB::select("
            SELECT 
                TABLE_NAME,
                UPDATE_TIME
            FROM information_schema.tables
            WHERE table_schema = ?
        ", [$dbName]);

        $tableCounts = [];
        $totalRecords = 0;

        foreach ($tables as $table) {
            $tableName = $table->TABLE_NAME;

            if (in_array($tableName, ['migrations', 'failed_jobs'])) {
                continue;
            }

            $count = DB::table($tableName)->count();

            $tableCounts[$tableName] = [
                'count' => $count,
                'updated_at' => $table->UPDATE_TIME
                    ? date('Y-m-d H:i:s', strtotime($table->UPDATE_TIME))
                    : null,
            ];

            $totalRecords += $count;
        }


        // -----------------------------
        // Database Size
        // -----------------------------
        $dbSize = DB::selectOne("
            SELECT 
                ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS size
            FROM information_schema.tables
            WHERE table_schema = ?
        ", [$dbName]);

        $databaseSize = $dbSize->size ?? 0;

        // -----------------------------
        // Last Backup Time
        // -----------------------------
        $backupPath = storage_path('app');
        $lastBackupTime = 'No backup found';

        if (File::exists($backupPath)) {
            $files = collect(File::files($backupPath))
                ->filter(fn($file) => $file->getExtension() === 'sql');

            if ($files->isNotEmpty()) {
                $latestFile = $files->sortByDesc(fn($f) => $f->getMTime())->first();
                $lastBackupTime = date('Y-m-d H:i:s', $latestFile->getMTime());
            }
        }

        return view('backend.system_dashboard', compact(
            'totalUsers',
            'totalRecords',
            'tableCounts',
            'databaseSize',
            'lastBackupTime'
        ));
    }

    public function viewTable($table)
    {
        if (!Schema::hasTable($table)) {
            abort(404);
        }

        if (request()->ajax()) {
            $query = DB::table($table)->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.table_view', compact('table'));
    }

    public function truncateTable(Request $request)
    {
        $table = $request->table;

        // ❌ Prevent dangerous tables
        $protected = ['users', 'migrations', 'password_resets'];

        if (in_array($table, $protected)) {
            return response()->json([
                'message' => 'This table is protected!'
            ], 403);
        }

        if (!Schema::hasTable($table)) {
            return response()->json([
                'message' => 'Invalid table!'
            ], 404);
        }

        DB::table($table)->truncate();

        return response()->json([
            'message' => "Table '$table' truncated successfully!"
        ]);
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
