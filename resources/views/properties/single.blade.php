@extends('layouts.app')

@section('content')

<body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

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
                @auth
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    @endauth
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
                @auth
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @endauth
                
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



    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

  </body>

@endsection

