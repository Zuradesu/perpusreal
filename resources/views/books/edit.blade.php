@extends('layouts.admin.sidebar')

@section('title', 'Books')
  
@section('content')
{{-- Bagian Konten --}}
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Update Buku</h5>
                <form action="{{ route('updatebook', $book->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="kode_buku" class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="{{ $book->kode_buku }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ $book->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="categories_id" class="form-label">Kategori</label>
                        <select class="form-select" id="categories_id" name="categories_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $book->categories_id ? 'selected' : '' }}>{{ $category->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Ada" {{ $book->status === 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Dipinjam" {{ $book->status === 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Buku</button>
                </form>
            </div>
        </div>
    </div>

@endsection