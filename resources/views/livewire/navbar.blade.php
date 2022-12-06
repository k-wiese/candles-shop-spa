
<div class="">
  <div class="container px-5 py-2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
      <div class="container-fluid">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <img src="{{ asset('img/logo.png') }}" height="40px" alt="">
          <span class="fs-4 mt-1 text-white"><b> Candles</b> <bdi class="text-info"> and Art</bdi></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbar2Label">        <span class="fs-4 mt-1 text-white"><b> Candles</b> <bdi class="text-info"> and Art</bdi></span>
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link {{url()->current() === url('/') ? 'active' : ''}} " aria-current="page" href="{{  route('home') }}">Home</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link {{url()->current() === url('/shop') ? 'active' : ''}}" href="{{  route('shop') }}">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{url()->current() === url('/contact') ? 'active' : ''}}" href="{{  route('contact') }}">Contact</a>
              </li>
              @if(Auth::check())
              <li class="nav-item">
                <a class="nav-link {{url()->current() === url('/dashboard') ? 'active' : ''}}" href="{{  route('dashboard') }}">Account</a>
              </li>
              @livewire('cart-counter')
              <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-sm m-1 btn-outline-danger">Logout</button>
              </form>
              </li>
              @else
              @livewire('cart-counter')
              <li class="nav-item">
                <a class="nav-link p-1" href="{{  route('login') }}">
                <button class="btn btn-sm btn-outline-info">Login</button>
                </a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
