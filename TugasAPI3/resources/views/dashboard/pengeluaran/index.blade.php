@extends('dashboard.layouts.master')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Catatan Pengeluaran</h1>
    </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('LoginError'))
            <div class="alert alert-denger alert-dismissible fade show col-lg-10" role="alert">
                {{ session('LoginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive-medium col-lg-10">
            <a href="/dashboard/pengeluaran/create" class="btn btn-primary mb-3">Tambahkan Pengeluaran</a>
            <form method="GET" action="/dashboard/pengeluaran/filter">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-text">Mulai Tanggal</div>
                            <input type="date" class="form-control" name="mulai_tanggal" value="{{ old('mulai_tanggal') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <div class="input-group-text">Sampai Tanggal</div>
                            <input type="date" class="form-control" name="sampai_tanggal" value="{{ old('sampai_tanggal') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-responsive-sm mt-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Pengeluaran</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluaran as $collect)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $collect->judul }}</td>
                    <td>{{ $collect->deskripsi }}</td>
                    <td>{{ $collect->jumlah }}</td>
                    <td>{{ date('d-m-Y', strtotime($collect->tanggal_pengeluaran)) }}</td>
                    <td>
                        <a href="/dashboard/pengeluaran/{{ $collect->id }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                        <a href="/dashboard/pengeluaran/{{ $collect->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="/dashboard/pengeluaran/{{ $collect->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure? ')"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2>Ringkasan Total Pengeluaran</h2>
                    <p>Total Pengeluaran: Rp {{ $totalpengeluaran }}</p>
                </div>
            </div>
      </div>
@endsection
