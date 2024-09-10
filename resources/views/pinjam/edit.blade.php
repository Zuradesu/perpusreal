@extends('layouts.admin.sidebar')

@section('title', 'Pinjam')
  
@section('content')
     
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Update Peminjaman</h5>
                <form action="{{ route('updatepinjam', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ $peminjaman->nama_peminjam }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $peminjaman->kelas }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                        <input type="date" class="form-control" id="tanggal_dipinjam" name="tanggal_dipinjam" value="{{ $peminjaman->tanggal_dipinjam }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Ongoing" {{ $peminjaman->status === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="Returned" {{ $peminjaman->status === 'Returned' ? 'selected' : '' }}>Returned</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection