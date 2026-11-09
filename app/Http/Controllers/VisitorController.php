<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Display all visitors
    public function index()
    {
        $visitors = Visitor::all();

        return view('visitors.index', compact('visitors'));
    }

    // Show the form to add a visitor
    public function create()
    {
        return view('visitors.create');
    }

    // Save a new visitor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'position' => 'required|string|max:255',
        ]);

        Visitor::create($validated);

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Visitor added successfully!');
    }

    // Display a specific visitor
    public function show(Visitor $visitor)
    {
        return view('visitors.show', compact('visitor'));
    }

    // Show the edit form
    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', compact('visitor'));
    }

    // Update visitor information
    public function update(Request $request, Visitor $visitor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'position' => 'required|string|max:255',
        ]);

        $visitor->update($validated);

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Visitor updated successfully!');
    }

    // Delete a visitor
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}