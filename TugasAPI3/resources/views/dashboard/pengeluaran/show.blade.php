@extends('dashboard.layouts.master')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">Details Catatan Pengeluaran</h1>
                <a href="/dashboard/pengeluaran" class="btn btn-success"><i class="bi bi-box-arrow-left"></i> Back to Table</a>
                <a href="/dashboard/pengeluaran/{{ $pengeluaran->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/pengeluaran/{{ $pengeluaran->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure? ')"><i class="bi bi-trash3"></i> Delete</button>
                </form>
                <div class="card mt-4" style="width: 20rem; border:solid;">
                    <div class="card-body">
                      <h3 class="card-title">judul: {{ $pengeluaran->judul }}</h3>
                      <h4 class="card-subtitle mt-3 text-body-dark">Tanggal: {{ date('d-m-Y', strtotime($pengeluaran->tanggal_pengeluaran)) }}</h4>
                      <h4 class="card-subtitle mt-3 text-body-dark">Jumlah: {{ $pengeluaran->jumlah }}</h4>
                      <p class="card-text mt-3">Deskripsi: {{ $pengeluaran->deskripsi }}</p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
