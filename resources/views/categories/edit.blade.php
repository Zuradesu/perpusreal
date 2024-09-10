@extends('layouts.admin.sidebar')

@section('title', 'Kategori')

@section('content')
      {{-- Bagian Konten --}}
      <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Update Kategori</h5>
                    <form action="{{ route('updatecategory', $category->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $category->nama }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Kategori</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
@endsection