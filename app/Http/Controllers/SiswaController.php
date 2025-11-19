<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswa = Siswa::orderBy('created_at', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('siswa.partials.index', compact('siswa'))->render();
        }

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return view('siswa.partials.create')->render();
        }

        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'phone' => 'nullable|string|max:20',
        ]);

        Siswa::create($validated);

        if ($request->ajax()) {
            return response()->json(['message' => 'Siswa created successfully.']);
        }

        return redirect()->route('siswa.index')->with('success', 'Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Siswa $siswa)
    {
        if ($request->ajax()) {
            return view('siswa.partials.show', compact('siswa'))->render();
        }

        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Siswa $siswa)
    {
        if ($request->ajax()) {
            return view('siswa.partials.edit', compact('siswa'))->render();
        }

        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,' . $siswa->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $siswa->update($validated);

        if ($request->ajax()) {
            return response()->json(['message' => 'Siswa updated successfully.']);
        }

        return redirect()->route('siswa.index')->with('success', 'Siswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Siswa $siswa)
    {
        $siswa->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Siswa deleted successfully.']);
        }

        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully.');
    }
}