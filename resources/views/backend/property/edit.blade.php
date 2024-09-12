@extends('layouts.backend', ['title' => 'Data Property'])

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        #map {
            height: 300px;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Property</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.properties.update', $property->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Name" value="{{ $property->name }}" required>
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" id="category"
                                            class="form-control @error('category') is-invalid @enderror" required>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" @selected($property->category_id == $item->id)>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select name="city" id="city"
                                            class="form-control @error('city') is-invalid @enderror" required>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->name }}" @selected($property->city == $item->name)>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price"
                                            class="form-control @error('price') is-invalid @enderror"
                                            placeholder="Enter price" value="{{ $property->price }}" required>
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" name="phone" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Enter Phone" value="{{ $property->phone }}" required>
                                        @error('phone')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter Email" value="{{ $property->email }}" required>
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="image1">Image 1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image1"
                                                    class="custom-file-input @error('image1') is-invalid @enderror"
                                                    id="image1" accept="image/jpeg, image/png, image/jpg">
                                                <label class="custom-file-label" for="image1">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image1')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <img src="{{ $property->image1 }}" alt="Image1" width="100">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="image2">Image 2</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image2"
                                                    class="custom-file-input @error('image2') is-invalid @enderror"
                                                    id="image2" accept="image/jpeg, image/png, image/jpg">
                                                <label class="custom-file-label" for="image2">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image2')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <img src="{{ $property->image2 }}" alt="Image1" width="100">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="image3">Image 3</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image3"
                                                    class="custom-file-input @error('image3') is-invalid @enderror"
                                                    id="image3" accept="image/jpeg, image/png, image/jpg">
                                                <label class="custom-file-label" for="image3">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image3')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <img src="{{ $property->image3 }}" alt="Image1" width="100">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror" required>
                                            <option value="available" @selected($property->status == 'available')>available</option>
                                            <option value="unavailable" @selected($property->status == 'unavailable')>unavailable</option>
                                        </select>
                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" name="latitude" id="latitude"
                                            class="form-control @error('latitude') is-invalid @enderror"
                                            placeholder="Enter Latitude" value="{{ $property->lat }}" required>
                                        @error('latitude')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" name="longitude" id="longitude"
                                            class="form-control @error('longitude') is-invalid @enderror"
                                            placeholder="Enter Longitude" value="{{ $property->long }}" required>
                                        @error('longitude')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="control maphere">
                                        <label for="name">Set Lokasi: Google Maps</label>
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description"
                                            class="form-control summernote @error('description') is-invalid @enderror" rows="3"
                                            placeholder="Enter Description">{!! $property->description !!}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('backend.properties.index') }}"
                                class="btn btn-md btn-secondary">Kembali</a>
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
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        var map;

        function initMap() {
            var position = {
                lat: {{ $property->lat }},
                lng: {{ $property->long }}
            };

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: position,
                mapId: "map",
            });

            var marker = new google.maps.marker.AdvancedMarkerElement({
                map,
                position: position,
                gmpDraggable: true,
                title: "This marker is draggable.",
            });

            marker.addListener("dragend", (event) => {
                position = marker.position;
                var lat = position.lat;
                var lng = position.lng;
                console.log(lat);
                $('#latitude').val(lat);
                $('#longitude').val(lng);
            });
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&loading=async&libraries=places,marker,drawing,geometry&callback=initMap&t=1"
        type="text/javascript"></script>

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
