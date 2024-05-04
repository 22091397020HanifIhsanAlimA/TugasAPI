@extends('dashboard.layouts.master')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Upload</h1>
    </div>
    <div class="col-lg-6">
        <form method="POST" action="/dashboard/upload" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namefile" class="form-label">Name File</label>
                <input type="text" class="form-control @error('namefile') is-invalid @enderror" id="namefile" name="namefile" required autofocus value="{{ old('namefile') }}">
                @error('namefile')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pdf" class="form-label">PDF</label>
                <input class="form-control @error('pdf') is-invalid @enderror" type="file" id="pdf" name="pdf">
                @error('pdf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="zip_rar" class="form-label">Zip/RAR</label>
                <input class="form-control @error('zip_rar') is-invalid @enderror" type="file" id="zip_rar" name="zip_rar">
                @error('zip_rar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Upload</button>
        </form>
    </div>
    <script>
        function previewImage() {
            const  image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
