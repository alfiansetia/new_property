@extends('layouts.frontend')
@section('content')
    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse ($articles as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('frontend.article_detail', $item->slug) }}"><img class="img-fluid"
                                                src="{{ $item->image }}" alt=""></a>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $item->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <a class="d-block h5 mb-2"
                                            href="{{ route('frontend.article_detail', $item->slug) }}">
                                            {{ $item->title }}
                                        </a>

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
