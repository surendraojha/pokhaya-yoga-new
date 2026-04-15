<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = Quote::all();
        return view('admin.quote.index', compact('informations'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quote.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        Quote::create([
            'message' => $request->message,
        ]);

        return redirect()->route('quote.index')->with('success', 'Quote created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quote::findOrFail($id);
        return view('admin.quote.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quote = Quote::findOrFail($id);
        return view('admin.quote.edit', compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $quote = Quote::findOrFail($id);

        $quote->update([
            'message' => $request->message,
        ]);

        return redirect()->route('quote.index')->with('success', 'Quote updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Quote::findOrFail($id)->delete();

        return redirect()->route('quote.index')->with('success', 'Quote deleted successfully');
    }
}