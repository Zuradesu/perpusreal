<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = categories::orderBy('created_at', 'DESC')->get();
  
        return view('categories.index', compact('categories'));
    }

    public function addpage()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255', // Sesuaikan dengan kebutuhan validasi Anda
        ]);
    
        // Simpan data kategori baru ke dalam database
        $kategori = new categories();
        $kategori->nama = $request->nama_kategori;
        $kategori->save();
    
        // Redirect ke halaman tertentu setelah menyimpan kategori
        return redirect()->route('categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
{
    $category = categories::find($id);
    
    if($category){
        $deleted = $category->delete();
        
        if ($deleted) {
            return redirect()->route('categories')->with('success', 'Berhasil Hapus Kategori');
        } else {
            return redirect()->route('categories')->with('error', 'Gagal Hapus Kategori');
        }
    } else {
        return redirect()->route('categories')->with('error', 'Kategori Tidak Ditemukan');
    }
}

public function edit($id)
{
    $category = categories::find($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'required|max:255', // Sesuaikan dengan kebutuhan validasi Anda
    ]);

    $category = categories::find($id);
    if ($category) {
        $category->nama = $request->nama_kategori;
        $category->save();

        return redirect()->route('categories')->with('success', 'Kategori berhasil diperbarui.');
    } else {
        return redirect()->route('categories')->with('error', 'Kategori tidak ditemukan.');
    }
}


    
    
    
}
