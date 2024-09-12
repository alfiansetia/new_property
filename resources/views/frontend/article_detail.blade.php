@extends('layouts.frontend')
@section('content')
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <div class="text-center">
                    <img src="{{ $article->image }}" alt="Image" style="height: 200px">
                    <h1 class="mb-3">{{ $article->title }}</h1>
                </div>
                <p style="text-align: left">{!! $article->content !!}</p>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">

                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @if (count($article->comments) < 1)
                        <div class="alert alert-danger" role="alert">
                            Empty Comment
                        </div>
                    @else
                        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                            @foreach ($article->comments as $item)
                                <div class="testimonial-item bg-light rounded p-3">
                                    <div class="bg-white border rounded p-4">
                                        <p>{{ $item->comment }}</p>
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid flex-shrink-0 rounded" src="{{ $item->user->avatar }}"
                                                style="width: 45px; height: 45px;">
                                            <div class="ps-3">
                                                <h6 class="fw-bold mb-1">{{ $item->user->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        @auth
                            @if (session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('frontend.comment', $article->id) }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="form-floating">
                                        <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="Leave a Comment here"
                                            id="comment" style="height: 100px" required>{{ old('comment') }}</textarea>
                                        <label for="comment">Comment</label>
                                        @error('comment')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Comment</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p class="mb-4">Please Login to Comment, <a href="{{ route('login') }}">LOGIN</a></p>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
