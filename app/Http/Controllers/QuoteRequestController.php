<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use Yajra\DataTables\DataTables;

class QuoteRequestController extends Controller
{
    /**
     * Display listing (DataTable + view)
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = QuoteRequest::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                // NAME
                ->editColumn('name', function ($row) {
                    return '<strong>' . e($row->name) . '</strong>';
                })

                // PHONE
                ->editColumn('phone', function ($row) {
                    return '<span class="text-primary">' . e($row->phone) . '</span>';
                })

                // EMAIL
                ->editColumn('email', function ($row) {
                    return $row->email
                        ? '<span class="text-muted">' . e($row->email) . '</span>'
                        : '<span class="text-danger">N/A</span>';
                })

                // PROJECT TYPE
                ->editColumn('project_type', function ($row) {
                    return $row->project_type
                        ? '<span class="badge bg-info">' . e($row->project_type) . '</span>'
                        : '<span class="text-muted">Not Specified</span>';
                })

                // MESSAGE (short preview)
                ->editColumn('message', function ($row) {
                    return $row->message
                        ? '<span title="' . e($row->message) . '">' .
                        \Str::limit(e($row->message), 50) .
                        '</span>'
                        : '<span class="text-muted">No message</span>';
                })

                // DATE
                ->editColumn('created_at', function ($row) {
                    return '<span class="text-secondary">' .
                        $row->created_at->format('d M Y, h:i A') .
                        '</span>';
                })

                // ACTIONS
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('quote_requests.show', $row->id) . '" 
                           class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                    ';
                })

                ->rawColumns([
                    'name',
                    'phone',
                    'email',
                    'project_type',
                    'message',
                    'created_at',
                    'action'
                ])
                ->make(true);
        }

        return view('backend.setting_management.quote_request.index');
    }

    /**
     * SHOW single quote request
     */
    public function show($id)
    {
        $quote = QuoteRequest::findOrFail($id);

        return view('backend.setting_management.quote_request.show', compact('quote'));
    }

    /**
     * Store (frontend form submission)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'project_type' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        QuoteRequest::create($request->all());

        return back()->with('success', 'Your quote request has been submitted successfully!');
    }

    /**
     * Delete (optional admin feature)
     */
    public function destroy($id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $quote->delete();

        return response()->json(['success' => true]);
    }
}
