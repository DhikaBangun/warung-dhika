<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Menampilkan daftar artikel di panel admin
    public function index()
    {
        $posts = Post::latest()->get();

        return view('admin.blog.index', compact('posts'));
    }

    // Menampilkan formulir tambah artikel
    public function create()
    {
        return view('admin.blog.create');

    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'diterbitkan' => 'required|boolean',
        ]);

        $data['slug'] = Str::slug($data['judul']);

        if (Post::where('slug', $data['slug'])->exists()) {
            $data['slug'] .= '-' . Str::lower(Str::random(6));
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('blog', 'public');
        }

        Post::create($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Menampilkan formulir edit artikel
    public function edit(Post $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    // Memperbarui artikel
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'diterbitkan' => 'required|boolean',
        ]);

        $slug = Str::slug($data['judul']);

        if (Post::where('slug', $slug)
            ->where('id', '!=', $post->id)
            ->exists()) {
            $slug .= '-' . Str::lower(Str::random(6));
        }

        $data['slug'] = $slug;

        if ($request->hasFile('gambar')) {
            if ($post->gambar) {
                Storage::disk('public')->delete($post->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('blog', 'public');
        }

        $post->update($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy(Post $post)
    {
        if ($post->gambar) {
            Storage::disk('public')->delete($post->gambar);
        }

        $post->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
