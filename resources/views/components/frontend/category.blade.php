<!-- Category Start -->
<div class="container-xxl py-5" id="category">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Pilih kategtori property sesuai yang anda butuhkan</p>
        </div>
        <div class="row g-4">
            @php
                $images = [
                    'icon-apartment.png',
                    'icon-villa.png',
                    'icon-house.png',
                    'icon-housing.png',
                    'icon-building.png',
                    'icon-neighborhood.png',
                    'icon-condominium.png',
                    'icon-luxury.png',
                ];
            @endphp
            @foreach ($categories as $item)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3"
                        href="{{ route('frontend.page', $item->slug) }}">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="{{ asset('frontend/img/' . $images[rand(0, 7)]) }}"
                                    alt="Icon">
                            </div>
                            <h6>{{ $item->name }}</h6>
                            <span>{{ $item->properties_count }} Properties</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Category End -->
