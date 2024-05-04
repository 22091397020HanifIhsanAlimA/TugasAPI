@extends('dashboard.layouts.master')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Pengeluaran</h1>
</div>
<div class="col-lg-6">
    <form method="POST" action="/dashboard/pengeluaran" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" class="form-control"  rows="2">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" required value="{{ old('jumlah') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
          <label for="tanggal_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
          <input type="date" class="form-control @error('tanggal_pengeluaran') is-invalid @enderror" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required value="{{ old('tanggal_pengeluaran') }}">
            @error('tanggal_pengeluaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan Pengeluaran</button>
      </form>
</div>
@endsection
