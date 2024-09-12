@extends('layouts.backend', ['title' => 'Add Article'])

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Article</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter Title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image"
                                                    class="custom-file-input @error('image') is-invalid @enderror"
                                                    id="image" accept="image/jpeg, image/png, image/jpg">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content" class="form-control summernote @error('content') is-invalid @enderror"
                                            rows="3" placeholder="Enter Content">{!! old('content') !!}</textarea>
                                        @error('content')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('backend.articles.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@push('js')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            bsCustomFileInput.init();

            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                        'subscript', 'clear'
                    ]],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            })
        })
    </script>
@endpush
