@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold mb-1">Tambah Buku Baru</h3>
                <p class="text-muted small mb-0">Isi formulir berikut untuk menambahkan buku ke sistem perpustakaan.</p>
            </div>
            <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf

                    {{-- TODO:- Buat form input untuk: judul, penulis, penerbit, tahun_terbit, dan stok --}}
                    {{--      - Tampilkan pesan error validasi di bawah setiap input jika ada error (@error) --}}
                    {{--      - Buat tombol submit untuk menyimpan data buku --}}

                    
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" name="judul" id="judul"
                class="form-control" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis"
                class="form-control" value="{{ old('penulis') }}" required>
            @error('penulis')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit"
                class="form-control" value="{{ old('penerbit') }}" required>
            @error('penerbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit"
                class="form-control" value="{{ old('tahun_terbit') }}"
                min="1900" max="2100" required>
            @error('tahun_terbit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok"
                class="form-control" value="{{ old('stok', 1) }}"
                min="0" required>
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Buku
        </button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
