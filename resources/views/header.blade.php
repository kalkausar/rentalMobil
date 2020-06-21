<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-1" role="banner">

  <div class="container">
    <div class="row align-items-center">

      <div class="col-6 col-xl-3">
        <h1 class="mb-0"><a href="/" class="text-black h2 mb-0">Rental Mobil</a></h1>
      </div>
      <div class="col-6 col-md-7 d-none d-xl-block">
        <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

          <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
            <li class="active">
              <a href="/">Home</a>
            </li>
            @if(Auth::check() && Auth::user()->roles_id===2)
            <li><a href="/pesanan">Pesanan</a></li>
            @endif
          </ul>
        </nav>
      </div>
      <div class="col-2 col-xl-2 text-right">
        @if(Auth::check() && Auth::user()->roles_id===2)
        <a href="/logout" class="btn btn-primary py-3 px-5 text-white">Logout</a>
        @else
        <a href="/loginPage" class="btn btn-primary py-3 px-5 text-white">Login</a>
        @endif
      </div>

    </div>
  </div>

</header>
