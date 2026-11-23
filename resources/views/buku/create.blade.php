@extends('layouts.app')

@section('judul', 'Tambah Buku')

@section('konten')

    <div class="card">
        <div class="card-header bg-primary text-white">Tambah Data Buku</div>
        <div class="card-body">

            @if (session('sukses'))
                <div class="alert alert-success">{{ session('sukses') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('buku.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control"
                           value="{{ old('isbn') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control"
                           value="{{ old('judul') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control"
                           value="{{ old('penulis') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control"
                           value="{{ old('tahun_terbit') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control"
                           value="{{ old('stok', 0) }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>

@endsection