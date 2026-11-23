@extends('layouts.app')

@section('judul', 'Detail Buku')

@section('konten')

    <div class="card">
        <div class="card-header bg-info text-white">Detail Buku</div>
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

            <table class="table table-borderless mb-0">
                <tr>
                    <th style="width: 180px">ISBN</th>
                    <td>{{ $buku->isbn }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>
                        @if ($buku->stok == 0)
                            <span style="color:red">{{ $buku->stok }}</span>
                        @else
                            {{ $buku->stok }}
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('buku.edit', $buku) }}" class="btn btn-warning">Ubah</a>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>

@endsection