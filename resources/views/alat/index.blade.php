
@extends('layouts.app')

@section('judul', 'Daftar Alat')

@section('konten')

    <a href="{{ route('alat.create') }}" class="btn btn-primary mb-3">
        + Tambah Alat
    </a>
    <form method="GET" action="{{ route('alat.index') }}">
        <input
        type="text"
        name="cari"
        class="form-control"
        placeholder="Cari nama alat..."
        value="{{ request('cari') }}"
        >
        <button type="submit">Cari</button>
        <a href="{{ route('alat.index') }}">Reset</a>
    </form>

    @if (session('sukses'))
        <p style="color:green">{{ session('sukses') }}</p>
    @endif

    <table class="table table-bordered table-striped table-hover bg-white">
        <tr class="table-dark">
            <th>Kode</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Kondisi</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>

        @forelse ($alat as $a)
            <tr>
                <td>{{ $a->kode }}</td>
                <td>{{ $a->nama }}</td>

                <td>
                    @if ($a->stok == 0)
                        <span style="color:red">{{ $a->stok }}</span>
                    @else
                        {{ $a->stok }}
                    @endif
                </td>

                <td>{{ $a->kondisi }}</td>
                <td>{{ $a->lokasi }}</td>

                <td>
                    <a href="{{ route('alat.show', $a) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('alat.edit', $a) }}" class="btn btn-warning btn-sm">Ubah</a>

                    <form method="POST"
                        action="{{ route('alat.destroy', $a) }}"
                        style="display:inline"
                        onsubmit="return confirm('Hapus alat ini?')">

                        @csrf
                        @method('DELETE')

                       <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data alat.</td>
            </tr>
        @endforelse
    </table>

    {{ $alat->links() }}

@endsection
