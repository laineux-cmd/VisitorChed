
@extends('layouts.app')

@section('title', 'Edit Visitor')

@section('content')

<div class="container">

    <h1>Edit Visitor</h1>

    <p>Update the visitor information below.</p>

    <form action="{{ route('visitors.update', $visitor->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label for="name">Visitor Name</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $visitor->name) }}"
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
            value="{{ old('address', $visitor->address) }}"
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
            value="{{ old('position', $visitor->position) }}"
            required
        >

        @error('position')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn primary">
            Update Visitor
        </button>

        <a href="{{ route('visitors.index') }}"
           class="btn secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
