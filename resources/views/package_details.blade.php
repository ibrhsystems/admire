@extends("_layouts.main")
@section("content")
@php 
    $commonmodel = new App\Models\Common_model;
@endphp
<?php /* <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="" />
  <meta name="title" content="" />
  <title>Package Details</title>

  <!-- bootstrap 5 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- owl carousel start -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.defaul css" />
  <!-- owl carousel end -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/jquery.fancybox.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Satisfy&display=swap"
    rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

  <!-- fonts awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <!-- coustom css -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <!--header section start-->
  <header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#"><img src="images/admire-logo (1).png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="about-us.html">About Us</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-auto-close="outside" href="#">Tour <i class="fa-solid fa-plus"></i></a>
                  <ul class="dropdown-menu">
                    <li class="dropend dropdown"><a class="dropdown-item dropdown-toggle" href="#">domestic tour</a>
                      <ul class="dropdown-menu dropdown-submenu">
                        <li><a href="#" class="dropdown-item">package</a></li>
                        <li><a href="package-details.html" class="dropdown-item">package details</a></li>
                      </ul>
                    </li>
                    <li class="dropend dropdown"><a class="dropdown-item dropdown-toggle" href="international-tour.html">international
                        tour</a>
                      <ul class="dropdown-menu dropdown-submenu">
                        <li><a href="#" class="dropdown-item">action</a></li>
                        <li><a href="#" class="dropdown-item">another action</a></li>
                        <li><a href="#" class="dropdown-item">some things else here</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="destionation-details.html" id="navbarDropdown" role="button" aria-expanded="false">
                    Destination
                    <!-- <i class="fa-solid fa-plus"></i> -->
                  </a>

                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="visa.html" id="navbarDropdown" role="button"
                    aria-expanded="false">
                    visa
                    <!-- <i class="fa-solid fa-plus"></i> -->
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="hotel.html">Hotel <i class="fa-solid fa-plus"></i> </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="hotel-details.html">Hotel Details</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">contact</a>
                </li>
              </ul>
              <a href="#" data-bs-toggle="modal" data-bs-target="#enquiry-form" class="book-btn comman-btn-hover">
                book a trip
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!--header section end--> */ ?>

  <!-- banner section start -->
  <section class="about-bannner" style="background-image: url({{ url('public/frontassets/images/about-banner-bg.jpg') }})">
    <div class="banner-content">
      <h1> {{ $solo->tour_title }} </h1>
      <ul>
        <li><a href="{{ url('/') }}">Home</a> <i class="fa-solid fa-arrow-right-long"></i> </li>
        <li> {{ $solo->url }}</li>
      </ul>
    </div>
  </section>
  <!-- banner section end -->

  <section class="package-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="hotel-box overlay-box">
            <a data-fancybox="gallery" href="{{ url(IMAGE_PATH.$solo->tour_image) }}">
              <img src="{{ url(IMAGE_PATH.$solo->tour_image) }}" alt="image">
              <div class="overlay"><i class="fa-solid fa-plus"></i></div>
            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-6">
              <div class="details-box overlay-box">
                <a data-fancybox="gallery" href="{{ url(IMAGE_PATH.$solo->tour_image2) }}">
                  <img src="{{ url(IMAGE_PATH.$solo->tour_image2) }}" alt="image">
                  <div class="overlay"><i class="fa-solid fa-plus"></i></div>
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="details-box overlay-box">
                <a data-fancybox="gallery" href="{{ url(IMAGE_PATH.$solo->tour_image3) }}">
                  <img src="{{ url(IMAGE_PATH.$solo->tour_image3) }}" alt="image">
                  <div class="overlay"><i class="fa-solid fa-plus"></i></div>
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="details-box overlay-box">
                <a data-fancybox="gallery" href="{{ url(IMAGE_PATH.$solo->tour_image4) }}">
                  <img src="{{ url(IMAGE_PATH.$solo->tour_image4) }}" alt="image">
                  <div class="overlay"><i class="fa-solid fa-plus"></i></div>
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="details-box overlay-box">
                <a data-fancybox="gallery" href="{{ url(IMAGE_PATH.$solo->tour_image5) }}">
                  <img src="{{ url(IMAGE_PATH.$solo->tour_image5) }}" alt="image">
                  <div class="overlay"><i class="fa-solid fa-plus"></i></div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <d class="details-content">

          <div class="deatails-area">
            <h6>
              <span>{{ $solo->sp }} <del>{{ $solo->mrp }}</del></span>
              /
              <strong>Per Person</strong>
            </h6>
          </div>
          <div class="package-info">
            <ul>
              <li> <i class="fa-regular fa-clock"></i>{{ $solo->day }}  Days / {{ $solo->night }} Night </li>
              <li> <i class="fa-solid fa-user"></i> Max People : {{ $solo->max_people }} </li>
              @php $destination = $commonmodel->getOneRecord('tbl_locations',['id'=>$solo->destination]); @endphp
              <li> <i class="fa-solid fa-user"></i> {{ (isset($destination->name))?$destination->name:'Location' }} </li>
            </ul>
          </div>
          {!! $solo->description !!}
          <!-- <p>Tour and travel refer to the activities related to planning, organizing, and experiencing trips to various
            destinations for leisure, exploration, adventure, or relaxation.Choose your destination based on your
            interests and preferences, whether it’s a cultural experience, a natural adventure, historical exploration,
            or a beach vacation.</p>
          <p>Book suitable accommodation, which can range from hotels, resorts, hostels, vacation rentals, or even
            camping depending on your travel style and destination.Arrange transportation to and within your
            destination. This can include flights, trains, buses, rental cars, or even cruises.</p> -->

          <h4>Included</h4>
          <div class="included-content">
            {!! $solo->included !!}
            <!-- <ul>
              <li> <i class="fa-solid fa-check"></i> Meal As Per Hotel Plan And Drinks Free Too. </li>
              <li> <i class="fa-solid fa-check"></i> Return Airport And Round Trip Transfers. </li>
              <li> <i class="fa-solid fa-check"></i> Accommodation On Twin Sharing Basis. </li>
              <li> <i class="fa-solid fa-check"></i> The Above Rates Are On Per Day Disposal Basi </li>
              <li> <i class="fa-solid fa-check"></i> Enjoy Brussels Day Tours. Overnight Brussels </li>
            </ul> -->
          </div>

          <h4>Excluded</h4>
          <div class="excluded-conntent">
            {!! $solo->excluded !!}
            <!-- <ul>
              <li> <i class="fa-solid fa-xmark"></i> AC Will Not Be Functional On Hills Or Slopes. </li>
              <li> <i class="fa-solid fa-xmark"></i> Any Other Service Not Mentioned </li>
              <li> <i class="fa-solid fa-xmark"></i> Additional Entry Fees Other Than Specified. </li>
              <li> <i class="fa-solid fa-xmark"></i> Amsterdam Canal Cruise Not Included For Basic </li>
            </ul> -->
          </div>
          <div class="hightlight-tour">
            <h4>Highlights of the Tour</h4>
            {!! $solo->highlights !!}
            <!-- <ul>
              <li>
                <i class="fa-solid fa-check"></i>
                Our Team Of Knowledgeable Guides And Travel Experts Are Dedicated To Making Your Journey Memorable And
                Worry-Free
              </li>
              <li>
                <i class="fa-solid fa-check"></i>
                Dive Into Rich Cultures And Traditions. Explore Historic Sites, Savor Authentic Cuisine, And Connect
                With Locals.
              </li>
              <li>
                <i class="fa-solid fa-check"></i>
                We Take Care Of All The Details, So You Can Focus On Creating Memories. Rest Assured That Your Journey
                Is In Capable Hands
              </li>
              <li>
                <i class="fa-solid fa-check"></i>
                Sip Cocktails On The Beach As You Watch The Sun Dip Below The Horizon.
              </li>
              <li>
                <i class="fa-solid fa-check"></i>
                From Accommodations To Dining Experiences, We Select The Best Partners To Ensure Your Comfort And
                Enjoyment Throughout Your Journey.
              </li>
            </ul> -->
          </div>

          <h4>Itinerary</h4>
          <div class="accordion" id="accordionExample">
            @if($solo->itinerary != '')
            @php $itineraryArr = json_decode($solo->itinerary); $d=1; @endphp
            @foreach($itineraryArr as $list)
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading{{ $d }}">
                <button class="accordion-button {{ ($d>1)?'collapsed':'' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $d }}" aria-expanded="{{ ($d>1)?'false':'true' }}" aria-controls="collapse{{ $d }}">
                  <span>Day {{ ($d<10)?'0'.$d:$d }}:</span>
                  <!-- Admire Big Ben, Buckingham Palace And St Paul’s Cathedral -->
                   {{ $list->title }}
                </button>
              </h2>
              <div id="collapse{{ $d }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $d }}"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <!-- <p>
                    Arrive Cairo airport, welcome greeting by our representative who will assist you and provide tra
                    nsfers to your Hotel in Cairo. (the clients will inform us about their arrival time minimum 7 days
                    before)
                  </p> -->
                  {!! $list->desc !!}
                  @if(isset($list->b_point) && $list->b_point != '')
                  {!! $list->b_point !!}
                  <!-- <ul>
                    <li>
                      <i class="fa-solid fa-check"></i>
                      Admire Big Ben, Buckingham Palace And St Paul’Cathedral
                    </li>
                    <li>
                      <i class="fa-solid fa-check"></i>
                      Chance To Spot Prominent Landmarks Of The City
                    </li>
                  </ul> -->
                  @endif
                </div>
              </div>
            </div>
            @php $d++; @endphp
            @endforeach
            @endif

            <?php /* <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span>Day 02 :</span>
                  Adventure Beggins
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Arrive Cairo airport, welcome greeting by our representative who will assist you and provide tra
                    nsfers to your Hotel in Cairo. (the clients will inform us about their arrival time minimum 7 days
                    before)</p>
                  <ul>
                    <li>
                      <i class="fa-solid fa-check"></i>
                      Admire Big Ben, Buckingham Palace And St Paul’Cathedral
                    </li>
                    <li>
                      <i class="fa-solid fa-check"></i>
                      Chance To Spot Prominent Landmarks Of The City
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <span>Day 03 :</span>
                  Historical Tour
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Arrive Cairo airport, welcome greeting by our representative who will assist you and provide tra
                    nsfers to your Hotel in Cairo. (the clients will inform us about their arrival time minimum 7 days
                    before)</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <span>Day 04 :</span>
                  Rest & Tour
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>
                    Please go to the London Eye ticket office to exchange your voucher for a ticket. You may be ask ed
                    for identification (driver's license, national identity card or passport). You will receive tickets
                    for the next available time slot, but you may request a different date or time, subject to
                    availability. The following items are not permitted: alcohol, baseball bats, bicycles (including
                    folding ones), explosives For all ticket holders, the number of people per capsule may vary.
                  </p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <span>Day 05 :</span>
                  Return
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                  </p>
                </div>
              </div>
            </div> */ ?>

          </div>

          <h4>Frequently Asked & Question</h4>
          <div class="accordion accordion-flush faq-accordion" id="my-accordion">
            <!--First Accordion-->
            @if($solo->faqs != '')
            @php $faqsArr = json_decode($solo->faqs); $n=1; @endphp
            @foreach($faqsArr as $list)
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed accordians-btn" data-bs-toggle="collapse"
                  data-bs-target="#desc{{ $n }}">
                  {{ ($n<10)?'0'.$n:$n }}. {{ $list->title }}
                  <!-- <span>
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-minus"></i>
                              </span> -->
                </button>
              </h2>
              <div class="accordion-collapse collapse" id="desc{{ $n }}" data-bs-parent="#my-accordion">
                <div class="accordion-body">
                  <!-- <p>
                    Aptent taciti sociosqu ad litora torquent per conubia nostra, per inci only Integer purus onthis
                    felis non aliquam.Mauris nec just vitae ann auctor tol euismod sit amet non ipsul growing this.
                  </p> -->
                  <p>{!! $list->desc !!}</p>
                </div>
              </div>
            </div>
            @php $n++; @endphp
            @endforeach
            @endif

            <?php /* <!--Second Accordion-->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed accordians-btn" data-bs-toggle="collapse"
                  data-bs-target="#css">
                  02. What payment methods do you accept?
                  <!-- <span>
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-minus"></i>
                              </span> -->
                </button>
              </h2>
              <div class="accordion-collapse collapse" id="css" data-bs-parent="#my-accordion">
                <div class="accordion-body">
                  <p>
                    Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus onthis
                    placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsul growing
                    this Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                  </p>
                </div>
              </div>
            </div>

            <!--Third Accordion-->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed accordians-btn" data-bs-toggle="collapse"
                  data-bs-target="#javascript">

                  03. Can I make changes to my reservation after booking?
                  <!-- <span>
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-minus"></i>
                              </span> -->
                </button>
              </h2>
              <div class="accordion-collapse collapse" id="javascript" data-bs-parent="#my-accordion">
                <div class="accordion-body">
                  <p>
                    Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus onthis
                    placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsul growing
                    this Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                  </p>
                </div>
              </div>
            </div>

            <!--Forth Accordion-->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed accordians-btn" data-bs-toggle="collapse"
                  data-bs-target="#bootstrap">
                  04. What is your cancellation policy?
                  <!-- <span>
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-minus"></i>
                              </span> -->
                </button>
              </h2>
              <div class="accordion-collapse collapse" id="bootstrap" data-bs-parent="#my-accordion">
                <div class="accordion-body">
                  <p>
                    Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus onthis
                    placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsul growing
                    this Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                  </p>
                </div>
              </div>
            </div>

            <!--Fifth Accordion-->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed accordians-btn" data-bs-toggle="collapse"
                  data-bs-target="#react">

                  05. Do you offer group booking discounts?
                  <!-- <span>
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-minus"></i>
                              </span> -->
                </button>
              </h2>
              <div class="accordion-collapse collapse" id="react" data-bs-parent="#my-accordion">
                <div class="accordion-body custom">
                  <p>
                    Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus onthis
                    placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsul growing
                    this Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                  </p>
                </div>
              </div>
            </div> */ ?>

          </div>
      </div>
    </div>
    </div>
  </section>


  <?php /*<!-- footer section start -->
  <footer class="footer-section">
    <div class="container">
      <div class="footer-top">
        <div class="row g-lg-4 gy-5">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-logo-section">
              <div class="footer-logo">
                <a href="#"><img src="images/admire-logo (1).png" alt="admire-logo"></a>
              </div>
              <h4>Want to Take Tour Packages?</h4>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="menu-title">
              <div class="footer-title">
                <h5>Quick Link</h5>
              </div>
              <div class="menu-links">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Destinations</a></li>
                  <li><a href="#">Tour Package</a></li>
                  <li><a href="#">Article</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="company-info">
              <div class="footer-company">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <g clip-path="url(#clip0_1139_225)">
                    <path
                      d="M17.5107 13.2102L14.9988 10.6982C14.1016 9.80111 12.5765 10.16 12.2177 11.3262C11.9485 12.1337 11.0514 12.5822 10.244 12.4028C8.44974 11.9542 6.0275 9.62168 5.57894 7.73772C5.3098 6.93027 5.84808 6.03314 6.65549 5.76404C7.82176 5.40519 8.18061 3.88007 7.28348 2.98295L4.77153 0.470991C4.05382 -0.156997 2.97727 -0.156997 2.34929 0.470991L0.644745 2.17553C-1.0598 3.96978 0.82417 8.72455 5.04066 12.941C9.25716 17.1575 14.0119 19.1313 15.8062 17.337L17.5107 15.6324C18.1387 14.9147 18.1387 13.8382 17.5107 13.2102Z">
                    </path>
                  </g>
                </svg>
                <h5>More Inquiry</h5>
              </div>
              <div class="num-deatail">
                <a href="#">+917015293565</a>
              </div>
              <div class="footer-company">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <g clip-path="url(#clip0_1139_218)">
                    <path
                      d="M6.56266 13.2091V16.6876C6.56324 16.8058 6.60099 16.9208 6.67058 17.0164C6.74017 17.112 6.83807 17.1832 6.9504 17.22C7.06274 17.2569 7.18382 17.2574 7.29648 17.2216C7.40915 17.1858 7.5077 17.1155 7.57817 17.0206L9.61292 14.2516L6.56266 13.2091ZM17.7639 0.104306C17.6794 0.044121 17.5799 0.00848417 17.4764 0.00133654C17.3729 -0.00581108 17.2694 0.015809 17.1774 0.0638058L0.302415 8.87631C0.205322 8.92762 0.125322 9.00617 0.0722333 9.1023C0.0191447 9.19844 -0.00472288 9.30798 0.00355981 9.41749C0.0118425 9.52699 0.0519151 9.6317 0.11886 9.71875C0.185804 9.80581 0.276708 9.87143 0.380415 9.90756L5.07166 11.5111L15.0624 2.96856L7.33141 12.2828L15.1937 14.9701C15.2717 14.9963 15.3545 15.0051 15.4363 14.996C15.5181 14.9868 15.5969 14.9599 15.6672 14.9171C15.7375 14.8743 15.7976 14.8167 15.8433 14.7482C15.8889 14.6798 15.9191 14.6021 15.9317 14.5208L17.9942 0.645806C18.0094 0.543093 17.996 0.438159 17.9554 0.342598C17.9147 0.247038 17.8485 0.164569 17.7639 0.104306Z">
                    </path>
                  </g>
                </svg>
                <h5>Send Mail</h5>
              </div>
              <div class="num-deatail">
                <a href="#">admiretourism@gmail.com</a>
              </div>
              <div class="footer-company">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <g clip-path="url(#clip0_1137_183)">
                    <path
                      d="M14.3281 3.08241C13.2357 1.19719 11.2954 0.0454395 9.13767 0.00142383C9.04556 -0.000474609 8.95285 -0.000474609 8.86071 0.00142383C6.70303 0.0454395 4.76268 1.19719 3.67024 3.08241C2.5536 5.0094 2.52305 7.32408 3.5885 9.27424L8.05204 17.4441C8.05405 17.4477 8.05605 17.4513 8.05812 17.4549C8.25451 17.7963 8.60632 18 8.99926 18C9.39216 18 9.74397 17.7962 9.94032 17.4549C9.94239 17.4513 9.9444 17.4477 9.9464 17.4441L14.4099 9.27424C15.4753 7.32408 15.4448 5.0094 14.3281 3.08241ZM8.99919 8.15627C7.60345 8.15627 6.46794 7.02076 6.46794 5.62502C6.46794 4.22928 7.60345 3.09377 8.99919 3.09377C10.3949 3.09377 11.5304 4.22928 11.5304 5.62502C11.5304 7.02076 10.395 8.15627 8.99919 8.15627Z">
                    </path>
                  </g>
                </svg>
                <div class="num-deatail">
                  <h5>Address</h5>
                </div>
              </div>
              <address>#SCF 11, 1st floor, Sarojini colony, Phase 1,Opp.Head office,Near BusStand, Yamunanagar 6F Gopala
                Tower Rajendra PlaceNew Delhi India - 110008</address>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-here">
              <div class="footer-title">
                <h5>We Are Here</h5>
              </div>
              <p>Quisque purus augue, facilisis andi neque idont accumsan fringilla massa. Vivamusol id nibhom
                condimentum.</p>
              <div class="footer-payment">
                <div class="footer-title">
                  <h5>Payment Partner</h5>
                </div>
              </div>
              <div class="footer-icons">
                <ul>
                  <li><a href="#"><img src="images/visa-logo.svg" alt="image"></a></li>
                  <li><a href="#"><img src="images/stripe-logo.svg" alt="image"></a></li>
                  <li><a href="#"><img src="images/paypal-logo.svg" alt="image"></a></li>
                  <li><a href="#"><img src="images/woo-logo.svg" alt="image"></a></li>
                  <li><a href="#"><img src="images/skrill-logo.svg" alt="image"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="row">
          <div class="col-lg-4">
            <div class="footer-bottom-icons">
              <div class="social-icon">
                <a href="#"> <i class="fa-brands fa-facebook-f"></i> </a>
                <a href="#"> <i class="fa-brands fa-twitter"></i> </a>
                <a href="#"> <i class="fa-brands fa-linkedin"></i> </a>
                <a href="#"> <i class="fa-brands fa-instagram"></i> </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="copyright">
              <p>©Copyright 2024 | Admire Tourism </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer-right">
              <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Condition</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer section end -->
  <!-- pop up enqiry form start -->
  <section class="enquiry-form-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="modal fade" id="enquiry-form">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title">Reach Us Anytime</h2>
                  <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-box">
                          <label for="">Name *</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="name" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="">Phone *</label>
                          <input type="tel" class="form-control" id="emailID" name="emailID"
                            placeholder=" Phone number" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="">Email *</label>
                          <input type="email" class="form-control" id="emailID" name="emailID" placeholder="email" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="">Travel Date *</label>
                          <input type="date" class="form-control" id="date" name="date" placeholder="email" />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="">No of Peoples *</label>
                          <input type="number" class="form-control" id="number" name="number" placeholder="Peoples" />
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="input-box">
                          <label for="">Write Your Massage *</label>
                          <textarea rows="4" class="form-control" name="message" id="message"
                            placeholder="whats on your mind"></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="submit-button-box">
                          <button type="submit" class="comman-btn-hover">Enquiry Now </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- pop up enqiry form end -->

  <!-- js link -->


  <!-- <script src="js/bootstrap.bundle.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/jquery.fancybox.js"></script>


  <script>
    $(document).ready(function () {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 10) {
          $('.header').addClass("scroll");
        } else {
          $('.header').removeClass("scroll");
        }

      });
      $('.slider-image').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ['<i class="fas fa-chevron-left">', '<i class="fas fa-chevron-right">'],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 3
          }
        }
      })
    });
  </script>

  <script src="js/script.js"></script>


</body>

</html>*/ ?>
@endsection()