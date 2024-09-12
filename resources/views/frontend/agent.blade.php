@extends('layouts.frontend')
@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Property Agents</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                @forelse ($agents as $item)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ $item->avatar }}" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                <small><i class="fas fa-phone-alt"></i> {{ $item->phone }}</small>
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
    <!-- Team End -->
@endsection
