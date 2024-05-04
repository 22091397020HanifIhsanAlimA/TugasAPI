@extends('dashboard.layouts.master')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">UPLOAD FILES</h1>
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
        <a href="/dashboard/upload/create" class="btn btn-primary mb-3">Add New Files</a>
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name file</th>
              <th scope="col">Image</th>
              <th scope="col">Pdf</th>
              <th scope="col">Zip/RAR</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($store as $collect)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $collect->namefile }}</td>
              <td>{{ $collect->image }}</td>
              <td>{{ $collect->pdf }}</td>
              <td>{{ $collect->zip_rar }}</td>
              <td>
                <a href="/dashboard/upload/{{ $collect->id }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <form action="/dashboard/upload/{{ $collect->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure? ')"><i class="bi bi-trash3"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
