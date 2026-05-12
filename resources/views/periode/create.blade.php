@extends('main')
@section('title', 'Tambah Periode')
@section('content')
    <form action="{{ route('periode.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_periode">Nama Periode</label>
            <input type="text" name="nama_periode" class="form-control" value="{{ old('nama_periode') }}">
            @error('nama_periode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}">
            @error('tahun')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" class="form-control">
                <option value="">Pilih Semester</option>
                <option value="Ganjil" {{ old('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                <option value="Genap" {{ old('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
            </select>
            @error('semester')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection