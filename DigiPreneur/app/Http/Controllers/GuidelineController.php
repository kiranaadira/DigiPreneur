<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guideline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuidelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guideline = Guideline::latest()->paginate(10);
        return view('guideline.index', compact('guideline'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guideline.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/guidelines', $imageName);
            $validated['image'] = 'guidelines/' . $imageName;
        }

        // Buat guideline baru
        Guideline::create($validated);

        return redirect()->route('guideline.index')
            ->with('success', 'Guideline berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guideline = Guideline::findOrFail($id);
        return view('guideline.show', compact('guideline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guideline = Guideline::findOrFail($id);
        return view('guideline.edit', compact('guideline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guideline = Guideline::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($guideline->image) {
                Storage::disk('public')->delete($guideline->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/guidelines', $imageName);
            $validated['image'] = 'guidelines/' . $imageName;
        }

        // Update guideline
        $guideline->update($validated);

        return redirect()->route('guideline.index')
            ->with('success', 'Guideline berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guideline = Guideline::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($guideline->image) {
            Storage::disk('public')->delete($guideline->image);
        }

        // Hapus guideline
        $guideline->delete();

        return redirect()->route('guideline.index')
            ->with('success', 'Guideline berhasil dihapus.');
    }
}