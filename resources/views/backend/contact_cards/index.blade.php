@extends('adminlte::page')

@section('title', 'Contact Cards')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Contact Cards</h3>
        <a href="{{ route('contact_cards.create') }}" class="btn btn-success btn-sm">
            Add Contact Card
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th width="5%">#</th>
                        <th width="15%">Image</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th width="10%">Status</th>
                        <th width="18%">Action</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($cards as $key => $card)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>

                                @if ($card->image)
                                    <img src="{{ asset($card->image) }}" style="height:60px">
                                @endif

                            </td>
                            <td>{{ $card->title }}</td>
                            <td>{{ ucfirst($card->type) }}</td>
                            <td>{{ $card->value }}</td>
                            <td>

                                @if ($card->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('contact_cards.show', $card->id) }}" class="btn btn-info btn-sm">
                                    View
                                </a>
                                <a href="{{ route('contact_cards.edit', $card->id) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('contact_cards.destroy', $card->id) }}" method="POST"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this contact card?')">

                                        Delete

                                    </button>
                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center text-muted">
                                No Contact Cards Found
                            </td>

                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@stop
