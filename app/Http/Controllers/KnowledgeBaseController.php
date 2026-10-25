<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeBase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KnowledgeBaseController extends Controller
{
    /**
     * Katalog Pusat Bantuan / Panduan Mandiri.
     */
    public function index(Request $request): View
    {
        $user = auth()->user();
        $isStaff = $user && ($user->isTeknisi() || $user->isAdmin());

        $query = KnowledgeBase::query()->with('author');

        // Jika pelapor biasa, hanya tampilkan yang sudah dipublikasikan
        if (!$isStaff) {
            $query->published();
        }

        // Filter kata kunci pencarian
        if ($request->filled('q')) {
            $query->search($request->string('q')->toString());
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $kategori = $request->string('kategori')->toString();
            if (array_key_exists($kategori, KnowledgeBase::KATEGORI_LIST)) {
                $query->where('kategori', $kategori);
            }
        }

        $panduans = $query->latest('created_at')->paginate(9)->withQueryString();

        // Hitung total per kategori untuk tab pills
        $categoryCounts = [];
        foreach (KnowledgeBase::KATEGORI_LIST as $k) {
            $catQuery = KnowledgeBase::where('kategori', $k);
            if (!$isStaff) {
                $catQuery->published();
            }
            $categoryCounts[$k] = $catQuery->count();
        }

        return view('panduan.index', [
            'panduans'        => $panduans,
            'kategoriList'    => KnowledgeBase::KATEGORI_LIST,
            'categoryCounts'  => $categoryCounts,
            'selectedCategory'=> $request->get('kategori', ''),
            'isStaff'         => $isStaff,
        ]);
    }

    /**
     * Baca artikel panduan solusi mandiri.
     */
    public function show(string $slug): View
    {
        $user = auth()->user();
        $isStaff = $user && ($user->isTeknisi() || $user->isAdmin());

        $query = KnowledgeBase::where('slug', $slug)->with('author');
        if (!$isStaff) {
            $query->published();
        }

        $panduan = $query->firstOrFail();
        $panduan->incrementViews();

        // Panduan terkait dalam kategori yang sama
        $related = KnowledgeBase::where('kategori', $panduan->kategori)
            ->where('id', '!=', $panduan->id)
            ->published()
            ->latest('views')
            ->take(3)
            ->get();

        return view('panduan.show', [
            'panduan' => $panduan,
            'related' => $related,
            'isStaff' => $isStaff,
        ]);
    }

    /**
     * Form tambah panduan baru (Khusus Staff / Admin).
     */
    public function create(): View
    {
        $this->authorizeStaff();

        return view('panduan.create', [
            'kategoriList' => KnowledgeBase::KATEGORI_LIST,
        ]);
    }

    /**
     * Simpan panduan baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorizeStaff();

        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string|in:' . implode(',', array_keys(KnowledgeBase::KATEGORI_LIST)),
            'ringkasan'    => 'required|string|max:500',
            'solusi'       => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
        ], [
            'judul.required'     => 'Judul panduan wajib diisi.',
            'kategori.required'  => 'Pilih salah satu kategori panduan.',
            'ringkasan.required' => 'Ringkasan singkat wajib diisi untuk pratinjau kartu.',
            'solusi.required'    => 'Langkah-langkah solusi wajib diisi.',
            'gambar.image'       => 'Berkas lampiran harus berupa gambar.',
            'gambar.max'         => 'Ukuran gambar maksimal 2MB.',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('panduan', 'public');
        }

        $slug = KnowledgeBase::generateSlug($validated['judul']);

        $panduan = KnowledgeBase::create([
            'judul'        => $validated['judul'],
            'slug'         => $slug,
            'kategori'     => $validated['kategori'],
            'ringkasan'    => $validated['ringkasan'],
            'solusi'       => $validated['solusi'],
            'gambar'       => $gambarPath,
            'is_published' => $request->boolean('is_published', true),
            'created_by'   => auth()->id(),
        ]);

        return redirect()->route('panduan.show', $panduan->slug)
            ->with('success', 'Artikel panduan berhasil diterbitkan!');
    }

    /**
     * Form edit artikel panduan.
     */
    public function edit(KnowledgeBase $panduan): View
    {
        $this->authorizeStaff();

        return view('panduan.edit', [
            'panduan'      => $panduan,
            'kategoriList' => KnowledgeBase::KATEGORI_LIST,
        ]);
    }

    /**
     * Update artikel panduan.
     */
    public function update(Request $request, KnowledgeBase $panduan): RedirectResponse
    {
        $this->authorizeStaff();

        $validated = $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string|in:' . implode(',', array_keys(KnowledgeBase::KATEGORI_LIST)),
            'ringkasan'    => 'required|string|max:500',
            'solusi'       => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'hapus_gambar' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        $gambarPath = $panduan->gambar;

        // Jika user mencentang hapus gambar
        if ($request->boolean('hapus_gambar') && $gambarPath) {
            Storage::disk('public')->delete($gambarPath);
            $gambarPath = null;
        }

        // Jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('panduan', 'public');
        }

        // Cek jika judul berubah untuk update slug
        if ($panduan->judul !== $validated['judul']) {
            $panduan->slug = KnowledgeBase::generateSlug($validated['judul'], $panduan->id);
        }

        $panduan->update([
            'judul'        => $validated['judul'],
            'kategori'     => $validated['kategori'],
            'ringkasan'    => $validated['ringkasan'],
            'solusi'       => $validated['solusi'],
            'gambar'       => $gambarPath,
            'is_published' => $request->boolean('is_published', true),
        ]);

        return redirect()->route('panduan.show', $panduan->slug)
            ->with('success', 'Artikel panduan berhasil diperbarui!');
    }

    /**
     * Hapus artikel panduan.
     */
    public function destroy(KnowledgeBase $panduan): RedirectResponse
    {
        $this->authorizeStaff();

        if ($panduan->gambar) {
            Storage::disk('public')->delete($panduan->gambar);
        }

        $panduan->delete();

        return redirect()->route('panduan.index')
            ->with('success', 'Artikel panduan berhasil dihapus.');
    }

    /**
     * Submit rating feedback pembaca (Apakah panduan ini membantu?).
     */
    public function feedback(Request $request, KnowledgeBase $panduan): JsonResponse
    {
        $request->validate([
            'helpful' => 'required|in:yes,no',
        ]);

        $panduan->rateHelpful($request->string('helpful')->toString() === 'yes');

        return response()->json([
            'success' => true,
            'yes'     => $panduan->helpful_yes,
            'no'      => $panduan->helpful_no,
        ]);
    }

    /**
     * Helper proteksi akses khusus Staf (Admin & Teknisi).
     */
    private function authorizeStaff(): void
    {
        $user = auth()->user();
        if (!$user || (!$user->isTeknisi() && !$user->isAdmin())) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengelola panduan.');
        }
    }
}
