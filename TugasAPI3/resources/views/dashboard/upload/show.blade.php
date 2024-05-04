@extends('dashboard.layouts.master')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">Details Upload</h1>
                <a href="/dashboard/upload" class="btn btn-success"><i class="bi bi-box-arrow-left"></i> Back to Table</a>
                <form action="/dashboard/upload/{{ $upload->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure? ')"><i class="bi bi-trash3"></i> Delete</button>
                </form>
                @if ($upload->image)
                    <img src="{{ asset('storage/'.$upload->image) }}" alt="" class="img-fluid mt-3">
                @else
                    <img src="https://source.unsplash.com/1200x400?" alt="" class="img-fluid mt-3">
                    {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3"> --}}
                @endif
            </div>
        </div>
    </div>
@endsection
