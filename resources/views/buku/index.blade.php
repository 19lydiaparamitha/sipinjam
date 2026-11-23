@extends('layouts.app')

@section('judul', 'Daftar Buku')

@section('konten')

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">
        + Tambah Buku
    </a>

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

    <form method="GET" action="{{ route('buku.index') }}" class="d-flex gap-2 mb-3">
        <input
            type="text"
            name="cari"
            class="form-control"
            placeholder="Cari judul buku..."
            value="{{ request('cari') }}"
        >
        <button type="submit" class="btn btn-success">Cari</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Reset</a>
    </form>

    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $b)
                <tr>
                    <td>{{ $b->isbn }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                    <td>
                        @if ($b->stok == 0)
                            <span style="color:red">{{ $b->stok }}</span>
                        @else
                            {{ $b->stok }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('buku.show', $b) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('buku.edit', $b) }}" class="btn btn-warning btn-sm">Ubah</a>
                        <form method="POST"
                              action="{{ route('buku.destroy', $b) }}"
                              style="display:inline"
                              onsubmit="return confirm('Hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $buku->links() }}

@endsection