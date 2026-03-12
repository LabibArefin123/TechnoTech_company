@extends('adminlte::page')

@section('title', 'Skill Section')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h3>Skill Section</h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" id="dataTables">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Skill Name</th>
                        <th>Percent</th>
                        <th>Serial</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($skills as $key => $skill)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->percent }}%</td>
                            <td>{{ $skill->serial }}</td>
                            <td>
                                @if ($skill->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('skill_sections.show', $skill->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('skill_sections.edit', $skill->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('skill_sections.destroy', $skill->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm delete-confirm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
