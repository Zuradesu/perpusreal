<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
class DashController extends Controller
{
    // public function index()
    // {
    //     // Mendapatkan total buku dari tabel books
    //     $totalBooks = books::count();

    //     // Mengirimkan data total buku ke view
    //     return view('dashboard', ['totalBooks' => $totalBooks]);
    // }

    public function index()
    {
        // Mendapatkan total buku dari tabel books
        $totalBooks = books::count();
        
        // Mendapatkan jumlah buku yang sedang dipinjam
        $borrowedBooks = books::where('status', 'dipinjam')->count();
        
        $readyBooks = books::where('status', 'Ada')->count();

        // Mengirimkan data ke view
        return view('dashboard', [
            'totalBooks' => $totalBooks,
            'borrowedBooks' => $borrowedBooks,
            'readyBooks' => $readyBooks
        ]);
    }
}
