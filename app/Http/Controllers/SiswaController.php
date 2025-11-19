<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;

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
        $lembaga = Lembaga::all();

        if ($request->ajax()) {
            return view('siswa.partials.create', compact('lembaga'))->render();
        }

        return view('siswa.create', compact('lembaga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|unique:siswa,nis',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'image' => 'nullable|image|max:2048',
            'lembaga_id' => 'nullable|exists:lembaga,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('siswa_images', 'public');
        }

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
        $lembaga = Lembaga::all();

        if ($request->ajax()) {
            return view('siswa.partials.edit', compact('siswa', 'lembaga'))->render();
        }

        return view('siswa.edit', compact('siswa', 'lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nis' => 'required|string|unique:siswa,nis,' . $siswa->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,' . $siswa->id,
            'image' => 'nullable|image|max:2048',
            'lembaga_id' => 'nullable|exists:lembaga,id',
        ]);

        if ($request->hasFile('image')) {
            if ($siswa->image) {
                Storage::disk('public')->delete($siswa->image);
            }
            $validated['image'] = $request->file('image')->store('siswa_images', 'public');
        }

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
        if ($siswa->image) {
            Storage::disk('public')->delete($siswa->image);
        }

        $siswa->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Siswa deleted successfully.']);
        }

        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully.');
    }

    /**
     * Export filtered siswa data to Excel.
     */
    public function export(Request $request)
    {
        $ids = $request->input('ids', null);
        if (is_array($ids)) {
            $filteredIds = $ids;
        } elseif (is_string($ids)) {
            $filteredIds = explode(',', $ids);
        } else {
            $filteredIds = null;
        }

        return Excel::download(
            new SiswaExport($filteredIds),
            'siswa_export_' . now()->format('Ymd_His') . '.xlsx'
        );
    }
}