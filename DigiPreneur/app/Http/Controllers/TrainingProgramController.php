<?php

namespace App\Http\Controllers;

use App\Models\TrainingProgram;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{
    /**
     * Terapkan middleware auth untuk semua metode.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan semua program pelatihan.
     */
    public function index(Request $request)
    {
        $query = TrainingProgram::query();

        // Filter Lokasi
        if ($request->has('location') && $request->location != '') {
            $query->where('location', $request->location);
        }

        // Filter Harga
        if ($request->has('price')) {
            if ($request->price == 'paid') {
                $query->where('price', '>', 0);
            } elseif ($request->price == 'free') {
                $query->where('price', '=', 0);
            }
        }

        // Sorting
        $query->orderBy('start_date', $request->get('sort', 'asc'));

        $programs = $query->get();

        return view('training_programs.index', compact('programs'));
    }

    /**
     * Menampilkan form untuk menambah jadwal pelatihan.
     */
    public function create()
    {
        return view('training_programs.create');
    }

    /**
     * Menyimpan jadwal pelatihan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|in:Online,Offline',
            'venue' => 'nullable|string|required_if:location,Offline',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('program_images', 'public');
            $data['image'] = $filePath;
        }

        TrainingProgram::create($data);

        return redirect()->route('training_programs.index')->with('success', 'Program berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail program pelatihan.
     */
    public function show($id)
    {
        $program = TrainingProgram::findOrFail($id);
        return view('training_programs.show', compact('program'));
    }

    /**
     * Menampilkan form edit jadwal.
     */
    public function edit(TrainingProgram $training_program)
    {
        return view('training_programs.edit', compact('training_program'));
    }

    /**
     * Menyimpan pembaruan jadwal.
     */
    public function update(Request $request, TrainingProgram $training_program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|in:Online,Offline',
            'venue' => 'nullable|string|required_if:location,Offline',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('program_images', 'public');
            $data['image'] = $filePath;
        }

        $training_program->update($data);

        return redirect()->route('training_programs.index')->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Menghapus program pelatihan.
     */
    public function destroy(TrainingProgram $training_program)
    {
        $training_program->delete();
        return redirect()->route('training_programs.index')->with('success', 'Program berhasil dihapus!');
    }
}
