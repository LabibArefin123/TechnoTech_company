@extends('adminlte::page')

@section('title', 'Quote Requests')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <h1 class="mb-0">Quote Requests</h1>
    </div>
@stop

@section('content')

    <style>
        .dataTables_processing {
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
        }
    </style>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-striped table-hover text-nowrap w-100" id="quoteTable">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        {{-- <th>Quote ID</th> --}}
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Project Type</th>
                        <th>Message</th>
                        <th>Requested At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

@stop

@section('js')
    <script>
        $(function() {

            $.fn.dataTable.ext.errMode = 'none';

            const table = $('#quoteTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('quote_requests.index') }}",

                language: {
                    processing: ""
                },

                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    // {
                    //     data: 'id'
                    // },
                    {
                        data: 'name'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'project_type'
                    },
                    {
                        data: 'message',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            table.on('error.dt', function(e, settings, techNote, message) {
                console.error(message);
                alert('Something went wrong loading quote requests.');
            });

        });
    </script>
@stop
