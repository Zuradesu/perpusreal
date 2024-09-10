@extends('layouts.admin.sidebar2')

@section('title', 'Pinjam Buku')
  
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Peminjaman</h5>
            <form action="{{ route('storepinjam') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
                </div>
                
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" required>
                </div>
                
                <div class="mb-3">
                    <label for="buku_id" class="form-label">Buku</label>
                    <select class="form-select" id="buku_id" name="buku_id" required>
                        <option value="">Pilih Buku</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->nama }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                    <input type="date" class="form-control" id="tanggal_dipinjam" name="tanggal_dipinjam" required>
                </div>
                
                <input type="hidden" name="status" value="ongoing">
                
                <button type="submit" class="btn btn-primary">Tambah Data Peminjaman</button>
            </form>
        </div>
    </div>
</div>

@endsection