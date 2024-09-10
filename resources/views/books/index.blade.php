@extends('layouts.admin.sidebar2')

@section('title', 'Books')
  
@section('content')
{{-- Hy --}}

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-semibold mb-4">Daftar Buku</h5>
                    <a href="{{ route('addbook') }}" class="btn btn-primary">Tambah Buku</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kode Buku</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kategori</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <div class="mb-4">
                            <div class="col-lg-6">
                                <form action="{{ route('books') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari berdasarkan kode buku atau nama" name="search">
                                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <tbody>
                            
                            @foreach($books as $book)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $book->kode_buku }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $book->nama }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $book->category ? $book->category->nama : 'Tidak Ada Kategori' }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $book->status }}</h6>
                                </td>

                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('editbook', $book->id) }}" class="btn btn-success"><i class="ti ti-edit nav-small-cap-icon fs-4"></i></a> |
                                        <form action="{{ route('hapusbook', $book->id) }}" method="POST" class="btn btn-dark p-0" onsubmit="return confirm('Ar Yu Sur?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-dark m-0" type="submit"><i class="ti ti-trash nav-small-cap-icon fs-4"></i></button>
                                        </form>    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection 
