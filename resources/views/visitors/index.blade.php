
@extends('layouts.app')

@section('title', 'Visitor List')

@section('content')

<div class="container">

    <h1>Visitor Records</h1>

    <p>Manage all registered visitors.</p>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('visitors.create') }}"
       class="btn primary">
        + Add New Visitor
    </a>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->id }}</td>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->address }}</td>
                        <td>{{ $visitor->position }}</td>

                        <td>
                            <div class="actions">
                                <a href="{{ route('visitors.show', $visitor->id) }}"
                                   class="btn secondary">
                                    View
                                </a>

                                <a href="{{ route('visitors.edit', $visitor->id) }}"
                                   class="btn warning">
                                    Edit
                                </a>

                                <form action="{{ route('visitors.destroy', $visitor->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this visitor?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            No visitor records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
