@extends('layouts.frontend')
@push('css')
    <style>
        #map {
            height: 400px;
        }
    </style>
@endpush
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn mt-0" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <div class="owl-carousel header-carousel">
                            <div class="owl-carousel-item">
                                <img class="img-fluid" src="{{ $property->image1 }}" alt="Image1">
                            </div>
                            <div class="owl-carousel-item">
                                <img class="img-fluid" src="{{ $property->image2 }}" alt="Image2">
                            </div>
                            <div class="owl-carousel-item">
                                <img class="img-fluid" src="{{ $property->image3 }}" alt="Image3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">[{{ $property->category->name }}] {{ $property->name }}</h1>
                    <p class="mb-4">{!! $property->description !!}</p>
                    <p><i class="fas fa-map-marker text-primary me-3"></i>{{ $property->city }}</p>
                    <p><i class="fas fa-dollar-sign text-primary me-3"></i>Rp. {{ hrg($property->price) }}</p>
                    <p><i class="fa fa-check text-primary me-3"></i>{{ $property->status }}</p>
                    <p><i class="fas fa-phone text-primary me-3"></i>{{ $property->phone }}</p>
                    <p><i class="fas fa-envelope text-primary me-3"></i>{{ $property->email }}</p>
                    <a class="btn btn-sm btn-primary py-3 px-5 mt-3" href="tel:{{ $property->phone }}">
                        <i class="fas fa-phone"></i> Call</a>
                    <a class="btn btn-sm btn-primary py-3 px-5 mt-3" href="mailto:{{ $property->email }}">
                        <i class="far fa-envelope"></i> Email</a>
                    <a class="btn btn-sm btn-primary py-3 px-5 mt-3"
                        href="http://www.google.com/maps/place/{{ $property->lat }},{{ $property->long }}"
                        target="_blank">
                        <i class="fas fa-map-marker"></i> Go To Maps</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-3">
        <div class="row">

            <div class="col-md-6 wow fadeInUp mt-3" data-wow-delay="0.1s">
                <div id="map"></div>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <p class="mb-4">Isi form dibawah ini Untuk info lebih lanjut.</p>
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('frontend.message', $property->id) }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Your Name" value="{{ old('name') }}" required>
                                    <label for="name">Your Name</label>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Your phone" value="{{ old('phone') }}" required>
                                    <label for="phone">Your Phone</label>
                                    @error('phone')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Your Email" value="{{ old('email') }}" required>
                                    <label for="email">Your Email</label>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Title" value="{{ old('title') }}" required>
                                    <label for="title">Title</label>
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Leave a message here"
                                        id="message" style="height: 100px" required>{{ old('message') }}</textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection
@push('js')
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
                gmpDraggable: false,
                title: "This marker is draggable.",
            });

        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&loading=async&libraries=places,marker,drawing,geometry&callback=initMap&t=1"
        type="text/javascript"></script>
@endpush
