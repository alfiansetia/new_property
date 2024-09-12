@extends('layouts.backend', ['title' => 'Data Comment'])

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
                        <h3 class="card-title">Data Comment</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="table" style="width: 100%;cursor: pointer;">
                            <thead>
                                <th style="width: 30px" class="text-center">No</th>
                                <th>Article</th>
                                <th>User</th>
                                <th>Comment</th>
                                <th style="width: 30px" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->article->title }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('frontend.article_detail', $item->article->slug) }}"
                                                    class="btn btn-sm btn-secondary" target="_blank">View</a>
                                                <form method="POST"
                                                    action="{{ route('backend.comments.destroy', $item->id) }}">
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
