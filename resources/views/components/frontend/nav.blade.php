 <!-- Navbar Start -->
 <div class="container-fluid nav-bar bg-transparent">
     <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
         <a href="{{ route('frontend.index') }}" class="navbar-brand d-flex align-items-center text-center">
             <div class="icon p-2 me-2">
                 <img class="img-fluid" src="{{ asset('img/logos.png') }}" alt="Icon"
                     style="width: 30px; height: 30px;">
             </div>
             <h1 class="m-0 text-primary">{{ env('APP_NAME') }}</h1>
         </a>
         <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto">
                 <a href="{{ route('frontend.index') }}"
                     class="nav-item nav-link {{ $title == 'Home' ? 'active' : '' }}">Home</a>
                 <a href="{{ route('frontend.agent') }}"
                     class="nav-item nav-link {{ $title == 'Agent' ? 'active' : '' }}">Agent</a>
                 <div class="nav-item dropdown">
                     <a href="#" class="nav-link dropdown-toggle {{ $title == 'Property' ? 'active' : '' }}"
                         data-bs-toggle="dropdown">Property</a>
                     <div class="dropdown-menu rounded-0 m-0">
                         @foreach ($categories as $item)
                             <a href="{{ route('frontend.page', $item->slug) }}"
                                 class="dropdown-item">{{ $item->name }}</a>
                         @endforeach
                     </div>
                 </div>
                 <a href="{{ route('frontend.article') }}"
                     class="nav-item nav-link {{ $title == 'Article' ? 'active' : '' }}">Article</a>
             </div>
             <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">
                 @auth
                     Dashboard
                 @else
                     Sign in
                 @endauth
             </a>
         </div>
     </nav>
 </div>
 <!-- Navbar End -->
