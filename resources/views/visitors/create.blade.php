
@extends('layouts.app')

@section('title', 'Add Visitor')

@section('content')

<div class="container">

    <h1>Register New Visitor</h1>

    <p>Fill in the visitor information below.</p>

    <form action="{{ route('visitors.store') }}" method="POST">

        @csrf

        <label for="name">Visitor Name</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter visitor name"
            required
        >

        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="address">Address</label>
        <input
            type="text"
            id="address"
            name="address"
            value="{{ old('address') }}"
            placeholder="Enter visitor address"
            required
        >

        @error('address')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="position">Position</label>
        <input
            type="text"
            id="position"
            name="position"
            value="{{ old('position') }}"
            placeholder="Enter visitor position"
            required
        >

        @error('position')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn primary">
            Save Visitor
        </button>

        <a href="{{ route('visitors.index') }}"
           class="btn secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
