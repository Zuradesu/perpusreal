<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\categories;
use App\Models\books;

class BooksController extends Controller
{
    // public function index()
    // {
    //     $books = books::with('category')->get();
    //     return view('books.index', compact('books'));
    //     $books = books::get();
    // }

    public function index(Request $request)
{
    $search = $request->query('search');

    // Jika tidak ada query pencarian, tampilkan semua buku
    if (!$search) {
        $books = books::with('category')->get();
    } else {
        // Jika ada query pencarian, cari buku berdasarkan kode buku atau nama
        $books = books::with('category')
                     ->where('kode_buku', 'like', "%$search%")
                     ->orWhere('nama', 'like', "%$search%")
                     ->get();
    }

    return view('books.index', compact('books'));
}

    
    public function addbook()
    {
        $categories = categories::all(); // Retrieve all categories from the database
        return view('books.create', compact('categories')); // Pass the categories to the view
    }

    // public function storebook(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'kode_buku' => 'required|string|max:255',
    //         'judul_buku' => 'required|string|max:255',
    //         'categories_id' => 'required|exists:categories,id', // Memastikan kategori ada di tabel categories
    //     ]);

    //     // Membuat instance buku baru
    //     $book = new Books();
    //     $book->kode_buku = $request->kode_buku;
    //     $book->nama = $request->judul_buku;
    //     $book->categories_id = $request->categories_id;
    //     $book->status = 'Ada'; // Menetapkan nilai default 'tersedia' untuk kolom status
    //     $book->save();

    //     // Menyimpan log
    //     Log::info('Buku baru berhasil ditambahkan: ' . $book->judul_buku);

    //     // Redirect ke halaman tertentu setelah berhasil menyimpan buku
    //     return redirect()->route('books')->with('success', 'Buku berhasil ditambahkan.');
    // }

    public function storebook(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_buku' => 'required|string|max:255|unique:books,kode_buku',
        'judul_buku' => 'required|string|max:255',
        'categories_id' => 'required|exists:categories,id', // Memastikan kategori ada di tabel categories
    ]);

    $book = new books();
    $book->kode_buku = $request->kode_buku;
    $book->nama = $request->judul_buku;
    $book->categories_id = $request->categories_id;
    $book->status = 'Ada'; // Menetapkan nilai default 'tersedia' untuk kolom status
    $book->save();

    // Menyimpan log
    Log::info('Buku baru berhasil ditambahkan: ' . $book->nama);

    // Redirect ke halaman tertentu setelah berhasil menyimpan buku
    return redirect()->route('books')->with('success', 'Buku berhasil ditambahkan.');
}


public function edit($id)
{
    $book = books::find($id);
    $categories = categories::all(); // Mendapatkan semua kategori
    return view('books.edit', compact('book', 'categories')); // Mengirimkan data buku dan kategori ke tampilan
}

public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id', // Memastikan kategori ada di tabel categories
            'status' => 'required|in:Ada,Dipinjam',
        ]);

        $book = Books::find($id);
        
        // Jika buku gada
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Buku tidak ditemukan.');
        }

        // updet data buku
        $book->kode_buku = $request->kode_buku;
        $book->nama = $request->judul_buku;
        $book->categories_id = $request->categories_id;
        $book->status = $request->status; 
        $book->save();

        return redirect()->route('books')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroyB($id)
{
    $book = books::find($id);
    
    if($book){
        $deleted = $book->delete();
        
        if ($deleted) {
            return redirect()->route('books')->with('success', 'Berhasil Hapus Kategori');
        } else {
            return redirect()->route('books')->with('error', 'Gagal Hapus Kategori');
        }
    } else {
        return redirect()->route('books')->with('error', 'Kategori Tidak Ditemukan');
    }
}

}
