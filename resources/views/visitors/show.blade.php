
@extends('layouts.app')

@section('title', 'Visitor Details')

@section('content')

<div class="container">

    <h1>Visitor Details</h1>

    <p><strong>Visitor ID:</strong> {{ $visitor->id }}</p>

    <p><strong>Name:</strong> {{ $visitor->name }}</p>

    <p><strong>Address:</strong> {{ $visitor->address }}</p>

    <p><strong>Position:</strong> {{ $visitor->position }}</p>

    <p>
        <strong>Date Registered:</strong>
        {{ $visitor->created_at->format('F d, Y h:i A') }}
    </p>

    <a href="{{ route('visitors.index') }}"
       class="btn secondary">
        Back to Visitor List
    </a>

    <a href="{{ route('visitors.edit', $visitor->id) }}"
       class="btn warning">
        Edit Visitor
    </a>

</div>

@endsection
