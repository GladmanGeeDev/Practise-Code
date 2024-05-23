<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    @extends('scripts.css')

    <title>
      Smart
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="index.html" class="logo m-0 float-start">Property</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li><a href="index.html">Home</a></li>
              <li class="has-children">
                <a href="properties.html">Properties</a>
                <ul class="dropdown">
                  <li><a href="#">Buy Property</a></li>
                  <li><a href="#">Sell Property</a></li>
                  <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                      <li><a href="#">Sub Menu One</a></li>
                      <li><a href="#">Sub Menu Two</a></li>
                      <li><a href="#">Sub Menu Three</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="services.html">Services</a></li>
              <li><a href="about.html">About</a></li>
              <li class="active"><a href="contact.html">Contact Us</a></li>
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

    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_3.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
              {{ $property->city}}
            </h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">
                  <a href="properties.html">Properties</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                {{ $property->title . ', ' . $property->city }}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide">
                <img src="{{ asset('assets/images/'.$property->image.'')}}" alt="Image" class="img-fluid" />
                {{-- <img src="images/img_2.jpg" alt="Image" class="img-fluid" />
                <img src="images/img_3.jpg" alt="Image" class="img-fluid" /> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h2 class="heading text-primary"> {{ $property->title}}</h2>
            <p class="meta"> {{ $property->city }}</p>
            <p class="text-black-50">
                {{ $property->description }}
            </p>
            <p class="text-black-50">
              Perferendis eligendi reprehenderit, assumenda molestias nisi eius
              iste reiciendis porro tenetur in, repudiandae amet libero.
              Doloremque, reprehenderit cupiditate error laudantium qui, esse
              quam debitis, eum cumque perferendis, illum harum expedita.
            </p>

            <div class="d-block agent-box p-5">
           
              <div class="text">
             
                <ul class="list-unstyled social dark-hover d-flex">
             
                  <li class="me-1">
                    <a href="https://twitter.com/intent/tweet?text={{ $property->title }}&url={{ route('properties.single', $property->id) }}"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="me-1">
                    <a href="https://facebook.com/sharer/sharer.php?u={{ route('properties.single', $property->id) }}&quote={{ $property->title }}"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="me-1">
                    <a href="https://linkedin.com/sharing/share-offsite/?url={{ route('properties.single', $property->id) }}"><span class="icon-linkedin"></span></a>
                  </li>
                </ul>
              </div>
            </div>
     
        </div>
        <div class="row mb-5">
            <div class="col-6">
              <form action="{{ route('save.property')}}" method="POST">
                @csrf
                <input name="property_id" type="hidden" value="{{ $property->id }}">
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                <input name="property_title" type="hidden" value="{{ $property->title }}">
                <input name="property_city" type="hidden" value="{{ $property->city }}">
                <input name="property_type" type="hidden" value="{{ $property->type}}">
                
                <input name="property_price" type="hidden" value="{{ $property->price}}">
                <input name="property_image" type="hidden" value="{{ $property->image}}">

                @if ($savedProperty > 0)

                <button name="submit" type="submit" class="btn btn-block btn-md btn-success" disabled>You Saved this Property</button>


                @else

                  <button name="submit" type="submit" class="btn btn-block btn-light btn-md">Save Property</button>
            
                @endif
            </form>
              <!--add text-danger to it to make it read-->
            </div>
            <div class="col-6">
              <form action="{{ route('apply.property')}}" method="POST">
                @csrf
                <input name="property_id" type="hidden" value="{{ $property->id }}">
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                
                <input name="property_title" type="hidden" value="{{ $property->title }}">
                <input name="property_city" type="hidden" value="{{ $property->city }}">
                <input name="property_type" type="hidden" value="{{ $property->type}}">
              
                <input name="property_price" type="hidden" value="{{ $property->salary}}">
                <input name="property_image" type="hidden" value="{{ $property->image}}">

                @if ($applyProperty > 0)

                <button name="submit" type="submit" class="btn btn-block btn-md btn-success" disabled>You Applied this Property</button>

                @else

                <button name="submit" type="submit" class="btn btn-block btn-light btn-md">Apply Property</button>

                @endif

              </form>
            </div>
          </div>
      </div>
      </div>
    </div>

    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>43 Raymouth Rd. Baltemoer, London 3910</address>
              <ul class="list-unstyled links">
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li>
                  <a href="mailto:info@mydomain.com">info@mydomain.com</a>
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
              <a href="https://untree.co">Untree.co</a>
              <!-- License information: https://untree.co/license/ -->
            </p>
            <div>
              Distributed by
              <a href="https://themewagon.com/" target="_blank">themewagon</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    @extends('scripts.scripts')
  </body>
</html>
