<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Articles::query();
    
        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
    
        // Filter berdasarkan tipe
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }
    
        // Urutan (sorting)
        if ($request->has('sort') && $request->sort != '') {
            $query->orderBy('created_at', $request->sort);
        } else {
            $query->orderBy('created_at', 'desc');
        }
    
        $articles = $query->paginate(12);
    
        return view('articles.index', compact('articles'));
    }

    /**
     * Generate PDF.
     */
    public function downloadPDF($id)
    {
        $article = Articles::find($id);

        if (!$article) {
            abort(404, 'Article not found');
        }

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        $html = view('articles.pdf', compact('article'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream($article->title . '.pdf', ['Attachment' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'type' => 'required|in:video,article,guide',
            'url' => 'nullable|url',
            'category' => 'required|string|max:255',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
            'author' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Simpan ke folder public/storage_articles
            $destinationPath = public_path('storage_articles');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Buat folder jika belum ada
            }
            $image->move($destinationPath, $imageName);
    
            // Simpan path gambar ke database
            $validated['thumbnail'] = 'storage_articles/' . $imageName;
        }

        Articles::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.show', compact('article')); // Compacting the correct variable
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'type' => 'required|in:video,article,guide',
            'url' => 'nullable|url',
            'category' => 'required|string|max:255',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
            'author' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article = Articles::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
                $image = $request->file('thumbnail');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
        
                // Simpan ke folder public/storage_articles
                $destinationPath = public_path('storage_articles');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true); // Buat folder jika belum ada
                }
                $image->move($destinationPath, $imageName);
        
                // Simpan path gambar ke database
                $validated['thumbnail'] = 'storage_articles/' . $imageName;
            }

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Articles::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
