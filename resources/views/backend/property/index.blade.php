@extends('layouts.backend', ['title' => 'Data Property'])

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Property</h3>

                        <div class="card-tools">
                            <a class="btn btn-sm btn-primary" href="{{ route('backend.properties.create') }}">Add
                                Property</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="table" style="width: 100%;cursor: pointer;">
                            <thead>
                                <th style="width: 30px" class="text-center">No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>City</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th style="width: 30px" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($properties as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ hrg($item->price) }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('frontend.property', $item->slug) }}"
                                                    class="btn btn-sm btn-secondary" target="_blank">View</a>
                                                <a href="{{ route('backend.properties.edit', $item->id) }}"
                                                    class="btn btn-sm  btn-info">Edit</a>
                                                <form method="POST"
                                                    action="{{ route('backend.properties.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Delete Data?')"
                                                        class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@push('js')
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
            });
        })
    </script>
@endpush
