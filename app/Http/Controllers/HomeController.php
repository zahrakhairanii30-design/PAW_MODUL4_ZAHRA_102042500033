<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan halaman depan katalog buku
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $penerbit = $request->input('penerbit');
        $sort = $request->input('sort');

        $buku = Buku::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%");
            });
        })
        ->when($penerbit, function ($query, $penerbit) {
            return $query->where('penerbit', $penerbit);
        })
        ->when($status, function ($query, $status) {
            if ($status === 'tersedia') {
                return $query->where('stok', '>', 0);
            } elseif ($status === 'habis') {
                return $query->where('stok', '<=', 0);
            }
        })
        ->when($sort, function ($query, $sort) {
            if ($sort === 'judul') {
                return $query->orderBy('judul', 'asc');
            } elseif ($sort === 'tahun') {
                return $query->orderBy('tahun_terbit', 'desc');
            } elseif ($sort === 'stok') {
                return $query->orderBy('stok', 'desc');
            }
            return $query->latest();
        }, function ($query) {
            return $query->latest();
        })
        ->paginate(8)
        ->withQueryString();

        $listPenerbit = Buku::select('penerbit')->distinct()->pluck('penerbit');

        return view('home', compact('buku', 'search', 'listPenerbit'));
    }

    // Menampilkan rincian detail buku untuk publik/mahasiswa
    public function show(Buku $buku)
    {
        return view('home_show', compact('buku'));
    }
}