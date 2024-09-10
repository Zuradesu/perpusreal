@extends('layouts.admin.sidebar')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center me-3">
                        <i class="ti ti-books fs-6"></i>
                    </div>
                    <div>
                        <h4 class="fw-semibold mb-0">{{ $totalBooks }}</h4>
                        <p class="text-muted mb-0">Total Buku</p>
                    </div>
                </div>
            </div>
            <div id="earning"></div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center me-3">
                        <i class="ti ti-book fs-6"></i>
                    </div>
                    <div>
                        <h4 class="fw-semibold mb-0">{{ $borrowedBooks }}</h4>
                        <p class="text-muted mb-0">Buku yang Tersedia</p>
                    </div>
                </div>
            </div>
            <div id="earning"></div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center me-3">
                        <i class="ti ti-heart-handshake fs-6"></i>
                    </div>
                    <div>
                        <h4 class="fw-semibold mb-0">{{ $readyBooks }}</h4>
                        <p class="text-muted mb-0">Buku yang dipinjam</p>
                    </div>
                </div>
            </div>
            <div id="earning"></div>
        </div>
    </div>
</div>

@endsection
