<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- our own CSS FILES --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />


    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])

   

    
  
</head>
<body>
    <div id="app">

        <nav class="site-nav">
            <div class="container">
              <div class="menu-bg-wrap">
                <div class="site-navigation">
                  <a href="{{ url('/')}}" class="logo m-0 float-start">SmatRentalPro</a>
      
                  <ul
                    class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
                  >
                    <li class="active"><a href="{{ route('home')}}">Home</a></li>
                   
                
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact Us</a></li>

                    @guest
                    @if (Route::has('login'))
                        <li class=""><a href="{{ route('login') }}">Log In</a></li>
                    @endif
                
                    @if (Route::has('register'))
                        <li class=""><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    @if (Auth::user()->hasVerifiedEmail())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <span>{{ __('Please verify your email') }}</span>
                        </li>
                    @endif
                @endguest
                
                  </ul>
      
                  <a
                    href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse"
                    data-target="#main-navbar"
                  >
                    <span></span>
                  </a>
                </div>
              </div>
            </div>
          </nav>

          <main style="margin-top: 120px;"> <!-- adjust the value as needed -->
            @yield('content')
        </main>


        <div class="site-footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                  <div class="widget">
                    <h3>Contact</h3>
                    <address>.......</address>
                    <ul class="list-unstyled links">
                      <li><a href="tel://11234567890">........</a></li>
                      <li><a href="tel://11234567890">.....</a></li>
                      <li>
                        <a href="mailto:info@mydomain.com">...</a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.widget -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <div class="widget">
                    <h3>Sources</h3>
                    <ul class="list-unstyled float-start links">
                      <li><a href="#">About us</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Vision</a></li>
                      <li><a href="#">Mission</a></li>
                      <li><a href="#">Terms</a></li>
                      <li><a href="#">Privacy</a></li>
                    </ul>
                    <ul class="list-unstyled float-start links">
                      <li><a href="#">Partners</a></li>
                      <li><a href="#">Business</a></li>
                      <li><a href="#">Careers</a></li>
                      <li><a href="#">Blog</a></li>
                      <li><a href="#">FAQ</a></li>
                      <li><a href="#">Creative</a></li>
                    </ul>
                  </div>
                  <!-- /.widget -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <div class="widget">
                    <h3>Links</h3>
                    <ul class="list-unstyled links">
                      <li><a href="#">Our Vision</a></li>
                      <li><a href="#">About us</a></li>
                      <li><a href="#">Contact us</a></li>
                    </ul>
      
                    <ul class="list-unstyled social">
                      <li>
                        <a href="#"><span class="icon-instagram"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="icon-twitter"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="icon-facebook"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="icon-linkedin"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="icon-pinterest"></span></a>
                      </li>
                      <li>
                        <a href="#"><span class="icon-dribbble"></span></a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.widget -->
                </div>
                <!-- /.col-lg-4 -->
              </div>
              <!-- /.row -->
      
              <div class="row mt-5">
                <div class="col-12 text-center">
                  <!-- 
                    **==========
                    NOTE: 
                    Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
                    **==========
                  -->
      
                  <p>
                    Copyright &copy;
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    . All Rights Reserved. &mdash; Designed with love by
                    <a href="#">Smatech Group</a>
              
                  </p>
              
                </div>
              </div>
            </div>
            <!-- /.container -->
          </div>
          <!-- /.site-footer -->
    </div>

    

    {{-- our script files --}}

    
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('assets/js/aos.js')}}"></script>
    <script src="{{ asset('assets/js/navbar.js')}}"></script>
    <script src="{{ asset('assets/js/counter.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
</body>
</html>
