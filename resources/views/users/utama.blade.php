<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/material-dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  {{-- <link rel="shortcut icon" href="images/favicon.png" type=""> --}}
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="">

  <title> WheelHouse </title>

  <!-- bootstrap core css -->
  {{-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  {{-- <link href="css/font-awesome.min.css" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{ asset('assets/img/car.jpeg') }}" alt="Gambar">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              WheelHouse
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('menu')}}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('customer')}}">Customer</a>
              </li>
            </ul>
            <div class="user_option">
                <a href="{{ route('register') }}" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <div class="header-center-text d-flex justify-content-center align-items-center" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:2;">
      <h1 class="text-white text-center" style="font-size:2.5rem;font-weight:bold;text-shadow:0 2px 8px rgba(0,0,0,0.4);">
        Welcome to WheelHouse
      </h1>
    </div>
    <style>
      .header-center-text {
        pointer-events: none;
      }
      @media (max-width: 768px) {
        .header-center-text h1 {
          font-size: 1.5rem;
        }
      }
    </style>

    
  </div>

  

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      {{-- <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".fries">Fries</li>
      </ul> --}}

    <div class="filters-content">
      <div class="row grid">
        @foreach($mobils as $mobil)
        <div class="col-sm-6 col-lg-4 all {{ strtolower($mobil->merk) }}">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->model }}">
              </div>
              <div class="detail-box">
                  <h5 style="color: #fff;">
                    {{ $mobil->merk }} {{ $mobil->model }}
                  </h5>
                  <p>
                    Merek: {{ $mobil->merk }} <br>
                    Model: {{ $mobil->model }} <br>
                    Tahun: {{ $mobil->tahun }} <br>
                    Harga: {{ $mobil->harga }} <br>
                    Stok: {{ $mobil->stok }}
                  </p>
              <div class="options">
                <h6>
                  Rp.{{ number_format($mobil->harga, 0, ',', '.') }}
                </h6>
                <form action="{{ route('beli.mobil', $mobil->id) }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-shopping-cart"></i>
                  </button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

    </div>
  </section>

  <!-- end about section -->


  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6>
                  Moana Michell
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                
                <img src="{{ asset('assets/img/client1.jpg') }}" alt="Gambar" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6>
                  Mike Hamell
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                {{-- <img src="images/client2.jpg" alt="" class="box-img"> --}}
                <img src="{{ asset('assets/img/client2.jpg') }}" alt="Gambar" class="box-img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              WheelHouse
            </a>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->
  {{-- <script src="../assets/js/core/popper.min.js"></script> --}}
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  {{-- <script src="../assets/js/core/bootstrap.min.js"></script> --}}
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  {{-- <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script> --}}
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
  {{-- <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script> --}}
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.js') }}"></script>
  {{-- <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!-- jQery -->
  {{-- <script src="js/jquery-3.4.1.min.js"></script> --}}
  <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  {{-- <script src="js/bootstrap.js"></script> --}}
  <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>