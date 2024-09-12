@extends('layouts.backend', ['title' => 'Data Category'])

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.categories.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('backend.categories.index') }}" class="btn btn-md btn-secondary">Kembali</a>
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
@endpush
