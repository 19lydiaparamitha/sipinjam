
@extends('layouts.app')

@section('judul', 'Ubah Alat')

@section('konten')
<div class="card shadow-sm border-0">
    <div class="card-header bg-warning text-dark py-3">
        <h4 class="mb-0">Ubah Data Alat</h4>
    </div>

    <div class="card-body p-4">
        <p class="text-muted mb-4">
            Perbarui informasi alat sesuai data terbaru.
        </p>

        <form action="{{ route('alat.update', $alat) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Alat</label>
                <input
                    type="text"
                    name="kode"
                    id="kode"
                    class="form-control @error('kode') is-invalid @enderror"
                    value="{{ old('kode', $alat->kode) }}"
                >
                @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Alat</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $alat->nama) }}"
                >
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input
                    type="number"
                    name="stok"
                    id="stok"
                    class="form-control @error('stok') is-invalid @enderror"
                    value="{{ old('stok', $alat->stok) }}"
                    min="0"
                >
                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi Alat</label>
                <select
                    name="kondisi"
                    id="kondisi"
                    class="form-select @error('kondisi') is-invalid @enderror"
                >
                    <option value="baik" {{ old('kondisi', $alat->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak ringan" {{ old('kondisi', $alat->kondisi) == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="rusak berat" {{ old('kondisi', $alat->kondisi) == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
                @error('kondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lokasi" class="form-label">Lokasi Alat</label>
                <input
                    type="text"
                    name="lokasi"
                    id="lokasi"
                    class="form-control @error('lokasi') is-invalid @enderror"
                    value="{{ old('lokasi', $alat->lokasi) }}"
                    placeholder="Masukkan lokasi alat"
                >
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    Perbarui Data
                </button>
                <a href="{{ route('alat.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
