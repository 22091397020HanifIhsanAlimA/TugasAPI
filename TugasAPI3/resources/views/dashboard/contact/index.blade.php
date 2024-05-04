@extends('dashboard.layouts.master')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CONTACT</h1>
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
        <a href="/dashboard/contact/create" class="btn btn-primary mb-3">Add New Contact</a>
        <table class="table table-striped table-responsive-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">ID user</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collects as $collect)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $collect->first_name }}</td>
              <td>{{ $collect->last_name }}</td>
              <td>{{ $collect->email }}</td>
              <td>{{ $collect->phone }}</td>
              <td>{{ $collect->user_id }}</td>
              <td>
                <a href="/dashboard/contact/{{ $collect->id }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="/dashboard/contact/{{ $collect->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/contact/{{ $collect->id }}" method="POST" class="d-inline">
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
