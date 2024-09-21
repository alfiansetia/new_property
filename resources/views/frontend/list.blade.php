@extends('layouts.frontend')
@section('content')
    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Property {{ $category->name }}</h1>
                        <p>Pilih property {{ $category->name }} sesuai kebutuhan anda.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Available</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-danger" data-bs-toggle="pill" href="#tab-2">Unavailable</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse ($available as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('frontend.property', $item->slug) }}"><img class="img-fluid"
                                                src="{{ $item->image1 }}" alt=""></a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ $item->status }}</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $item->category->name }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Rp. {{ hrg($item->price) }}</h5>
                                        <a class="d-block h5 mb-2"
                                            href="{{ route('frontend.property', $item->slug) }}">{{ $item->name }}</a>
                                        <p>
                                            <a href="http://www.google.com/maps/place/{{ $item->lat }},{{ $item->long }}"
                                                target="_blank">
                                                <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->city }}
                                            </a>

                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fab fa-whatsapp text-primary me-2"></i>{{ $item->phone }}</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="far fa-envelope text-primary me-2"></i>{{ $item->email }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Belum tersedia
                            </div>
                        @endforelse
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @forelse ($unavailable as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('frontend.property', $item->slug) }}"><img class="img-fluid"
                                                src="{{ $item->image1 }}" alt=""></a>
                                        <div
                                            class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            {{ $item->status }}</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $item->category->name }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Rp. {{ hrg($item->price) }}</h5>
                                        <a class="d-block h5 mb-2"
                                            href="{{ route('frontend.property', $item->slug) }}">{{ $item->name }}</a>
                                        <p>
                                            <a href="http://www.google.com/maps/place/{{ $item->lat }},{{ $item->long }}"
                                                target="_blank">
                                                <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->city }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fab fa-whatsapp text-primary me-2"></i>{{ $item->phone }}</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="far fa-envelope text-primary me-2"></i>{{ $item->email }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Belum tersedia
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection
