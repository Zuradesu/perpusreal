<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\books;
use App\Models\pinjam;
class PinjamController extends Controller
{
    // public function index()
    // {
    //     $pinjams = pinjam::with('books')->get(); 
    //     return view('pinjam.index', compact('pinjams'));

        
    // }

    public function index(Request $request)
{
    $search = $request->query('search');

    // Jika tidak ada query pencarian, tampilkan semua buku
    if (!$search) {
        $pinjams = pinjam::with('books')->get();
    } else {
        // Jika ada query pencarian, cari buku berdasarkan kode buku atau nama
        $pinjams = pinjam::with('books')
                     ->where('nama_peminjam', 'like', "%$search%")
                     ->orWhere('kelas', 'like', "%$search%")
                     ->get();
    }

    return view('pinjam.index', compact('pinjams'));
}
    

    // public function addpinjam()
    // {
    //     $pinjam = pinjam::all(); // Retrieve all categories from the database
    //     return view('pinjam.create', compact('pinjam')); // Pass the categories to the view
    // }

    public function addpinjam()
    {
        $books = books::where('status', 'ada')->get(); // Ambil semua buku dengan status 'ada'
        return view('pinjam.create', compact('books')); // Teruskan daftar buku ke view
    }

    public function storepinjam(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'buku_id' => 'required|exists:books,id', // Memastikan buku ada di tabel books
            'tanggal_dipinjam' => 'required|date',
            'status' => 'required|string', // Misalnya ongoing
        ]);
    
        // Simpan data peminjaman ke dalam database
        $peminjaman = new pinjam();
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->kelas = $request->kelas;
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->tanggal_dipinjam = $request->tanggal_dipinjam;
        $peminjaman->status = $request->status;
        $peminjaman->save();
    
        // Update status buku menjadi 'dipinjam'
        $book = books::find($request->buku_id);
        $book->status = 'dipinjam';
        $book->save();
    
        Log::info('Data peminjaman berhasil ditambahkan: ' . $peminjaman->nama_peminjam);
    
        // Redirect ke halaman tertentu setelah menyimpan data peminjaman
        return redirect()->route('pinjam')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $peminjaman = pinjam::find($id);
        return view('pinjam.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tanggal_dipinjam' => 'required|date',
            'status' => 'required|string',
        ]);
    
        $peminjaman = pinjam::find($id);
    
        if (!$peminjaman) {
            return redirect()->route('pinjam')->with('error', 'Data peminjaman tidak ditemukan.');
        }
    
        // Check if the status has changed to 'Returned'
        $statusChanged = $peminjaman->status !== 'Returned' && $request->status === 'Returned';
    
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->kelas = $request->kelas;
        $peminjaman->tanggal_dipinjam = $request->tanggal_dipinjam;
        $peminjaman->status = $request->status;
        $peminjaman->save();
    
        // Update book status if returned
        if ($statusChanged) {
            $book = books::find($peminjaman->buku_id);
            if ($book) {
                $book->status = 'Ada';
                $book->save();
            }
        }
    
        Log::info('Data peminjaman berhasil diperbarui: ' . $peminjaman->nama_peminjam);
    
        return redirect()->route('pinjam')->with('success', 'Data peminjaman berhasil diperbarui.');
    }



public function destroyP($id)
{
    $pinjam = pinjam::find($id);
    
    if($pinjam){
        $deleted = $pinjam->delete();
        
        if ($deleted) {
            return redirect()->route('pinjam')->with('success', 'Berhasil Hapus Data');
        } else {
            return redirect()->route('pinjam')->with('error', 'Gagal Hapus Data');
        }
    } else {
        return redirect()->route('pinjam')->with('error', 'Kategori Tidak Data');
    }
}

}
