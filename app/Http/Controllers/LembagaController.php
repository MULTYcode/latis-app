<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga = Lembaga::orderBy('created_at', 'desc')->paginate(10);
        return view('lembaga.index', compact('lembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lembaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Lembaga::create($validated);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembaga $lembaga)
    {
        return view('lembaga.show', compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lembaga $lembaga)
    {
        return view('lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lembaga $lembaga)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $lembaga->update($validated);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembaga $lembaga)
    {
        $lembaga->delete();

        return redirect()->route('lembaga.index')->with('success', 'Lembaga deleted successfully.');
    }
}