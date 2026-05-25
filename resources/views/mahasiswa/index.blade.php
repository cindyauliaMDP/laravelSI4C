@extends('main')

@section('title')
    <h1>Data Mahasiswa</h1>
@endsection

@section('content')
    <a href={{ route('mahasiswa.create') }} class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table class="table table-border table-hover" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        @foreach ($mahasiswa as $key => $mhs)
            <tr>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->prodi->nama_prodi ?? '-' }}</td>
                <td>
                    @if ($mhs->foto)
                        <img src="{{ asset('storage/' . $mhs->foto) }}" alt="Foto" width="50">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

