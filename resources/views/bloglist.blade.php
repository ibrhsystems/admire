@extends("_layouts.main")
@section("content")
<?php /*<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
    <meta name="title" content="" />
    <title>blog list</title>

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- owl carousel start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.defaul css" />

    <!-- owl carousel end -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Satisfy&display=swap"
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
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                                    <a class="nav-link dropdown-toggle" data-bs-auto-close="outside" href="#">Tour <i
                                            class="fa-solid fa-plus"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropend dropdown"><a class="dropdown-item dropdown-toggle"
                                                href="#">domestic tour</a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li><a href="#" class="dropdown-item">package</a></li>
                                                <li><a href="package-details.html" class="dropdown-item">package
                                                        details</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropend dropdown"><a class="dropdown-item dropdown-toggle"
                                                href="international-tour.html">international tour</a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li><a href="#" class="dropdown-item">action</a></li>
                                                <li><a href="#" class="dropdown-item">another action</a></li>
                                                <li><a href="#" class="dropdown-item">some things else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="destionation-details.html"
                                        id="navbarDropdown" role="button" aria-expanded="false">
                                        Destination
                                        <!-- <i class="fa-solid fa-plus"></i> -->
                                    </a>

                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="visa.html" id="navbarDropdown"
                                        role="button" aria-expanded="false">
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
                            <a href="#" data-bs-toggle="modal" data-bs-target="#enquiry-form"
                                class="book-btn comman-btn-hover">
                                book a trip
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--header section end--> */?>

    <!-- banner section start -->
    @php
        $commonmodel = new App\Models\Common_model;
        $url = url('public/frontassets/images/about-banner-bg.jpg');
        if(isset($banner) && $banner->image != ''){
            $url = url(IMAGE_PATH.$banner->image);
        }
    @endphp
    <section class="about-bannner" style="background-image: url({{ $url }})">
        <div class="banner-content">
            <h1>{{ (isset($banner))?ucwords($banner->main_title):'' }}</h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a> <i class="fa-solid fa-arrow-right-long"></i> </li>
                <li>{{ (isset($banner))?ucwords($banner->main_title):'' }}</li>
            </ul>
        </div>
    </section>
    <!-- banner section end -->

    <!--Blog panel-->
    <section class="blog-panel">
        <div class="container">
            <div class="row">
                @if(sizeof($blogs))
                @foreach($blogs as $list)
                @php $DtlsUrl = url('blog/'.$list->blog_url);
                $catDtls = $commonmodel->getOneRecord('tbl_blog_category',['catid'=>$list->catid]);
                $catName = (isset($catDtls->cat_name))?$catDtls->cat_name:'';
                @endphp
                <div class="col-md-6">
                    <div class="blog-card">
                        <div class="blog-img-box">
                            <a href="{{ $DtlsUrl }}">
                                <img src="{{ url(IMAGE_PATH.$list->blog_image) }}" alt="image" />
                            </a>
                        </div>
                        <div class="content">
                            <a href="javascript:void(0)" class="digital-marketing-btn">{{ $catName }}</a>
                            <h2>
                                <a href="{{ $DtlsUrl }}">
                                {{ $list->blog_title }}
                                </a>
                            </h2>
                            <p>
                            {!! $list->short_desc !!}
                            </p>

                            <span>
                                published : <span class="date">{{ date('d-m-Y', strtotime($list->post_date)) }}</span>
                            </span>
                            <div class="view-box">
                                <span><i class="fa-solid fa-users"></i>{{ $list->tot_views }} Views</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <?php /* <div class="col-md-6">
                    <div class="blog-card">
                        <div class="blog-img-box">
                            <a href="blogdetails.html">
                                <img src="{{ url('public/frontassets/images/blog-1.jpg') }}" alt="image" />
                            </a>
                        </div>
                        <div class="content">
                            <a href="blogdetails.html" class="digital-marketing-btn">digital marketing</a>
                            <h2>
                                <a href="blogdetails.html">
                                    "Mastering the science of identifying your company’s target audience."
                                </a>
                            </h2>
                            <p>
                                When running digital marketing campaigns, defining a specific target is crucial.
                                Therefore, we emphasize
                                the importance of identifying and understanding your ideal client to ensure your efforts
                                effectively
                                reach the right audience.
                            </p>

                            <span>
                                published : <span class="date">30-12-2024</span>
                            </span>
                            <div class="view-box">
                                <span><i class="fa-solid fa-users"></i>1221 Views</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="blog-card">
                        <div class="blog-img-box">
                            <a href="blogdetails.html">
                                <img src="{{ url('public/frontassets/images/blog-2.jpg') }}" alt="image" />
                            </a>
                        </div>
                        <div class="content">
                            <a href="blogdetails.html" class="digital-marketing-btn">digital marketing</a>
                            <h2>
                                <a href="blogdetails.html">
                                    "A checklist for selecting the ideal digital marketing agency for you."
                                </a>
                            </h2>
                            <p>
                                Companies dedicate significant effort to finding their ideal client (buyer persona),
                                aiming to attract
                                users who are ready to convert into customers. Given this focus, it’s crucial to
                                optimize strategies
                                that effectively target these prospects.
                            </p>

                            <span>
                                published : <span class="date">30-12-2024</span>
                            </span>
                            <div class="view-box">
                                <span><i class="fa-solid fa-users"></i>1221 Views</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="blog-card">
                        <div class="blog-img-box">
                            <a href="blogdetails.html">
                                <img src="{{ url('public/frontassets/images/blog-3.jpg') }}" alt="image" />
                            </a>
                        </div>
                        <div class="content">
                            <a href="blogdetails.html" class="digital-marketing-btn">digital marketing</a>
                            <h2>
                                <a href="blogdetails.html">
                                    "The Fantastic Four: Boosting the image of your small business!"
                                </a>
                            </h2>
                            <p>
                                It's common to lose perspective when working with the same concepts daily, making it
                                hard to communicate
                                them effectively. If you relate to this, and constantly find yourself questioning how to
                                express these
                                ideas clearly,
                            </p>

                            <span>
                                published : <span class="date">30-12-2024</span>
                            </span>
                            <div class="view-box">
                                <span><i class="fa-solid fa-users"></i>1221 Views</span>
                            </div>
                        </div>
                    </div>
                </div> */ ?>
            </div>
        </div>
    </section>
    <!--Blog panel end-->

    <!-- footer section start -->
    <?php /* <footer class="footer-section">
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
                            <address>#SCF 11, 1st floor, Sarojini colony, Phase 1,Opp.Head office,Near BusStand,
                                Yamunanagar 6F Gopala Tower Rajendra PlaceNew Delhi India - 110008</address>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-here">
                            <div class="footer-title">
                                <h5>We Are Here</h5>
                            </div>
                            <p>Quisque purus augue, facilisis andi neque idont accumsan fringilla massa. Vivamusol id
                                nibhom condimentum.</p>
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
                                                    <input type="text" class="form-control" id="firstname"
                                                        name="firstname" placeholder="name" />
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
                                                    <input type="email" class="form-control" id="emailID" name="emailID"
                                                        placeholder="email" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="">Travel Date *</label>
                                                    <input type="date" class="form-control" id="date" name="date"
                                                        placeholder="email" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <label for="">No of Peoples *</label>
                                                    <input type="number" class="form-control" id="number" name="number"
                                                        placeholder="Peoples" />
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 10) {
                    $('.header').addClass("scroll");
                } else {
                    $('.header').removeClass("scroll");
                }
            });
        });

    </script>

    <script src="js/script.js"></script>

</body>

</html> */ ?>
@endsection()