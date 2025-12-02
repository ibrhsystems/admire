<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
    <meta name="title" content="" />
    <title>Admire Tourism</title>
    <link rel="icon" type="image/x-icon" href="{{ url('public/frontassets/images/admire-logo (1).png') }}">

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{ url('public/frontassets/css/bootstrap.min.css') }}">
    <!-- owl carousel start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.defaul css"/>
    <!-- owl carousel end -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Satisfy&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <!-- fonts awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- coustom css -->
    <link rel="stylesheet" href="{{ url('public/frontassets/css/style.css') }}">

    <script src="{{ url('public/frontassets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script defer src="{{ url('public/frontassets/js/sweetalert.min.js') }}"></script>

</head>

<body>
    @include("_layouts.header")        

    @yield('content')

    @include("_layouts.footer")

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
                      <form action="{{ url('/home/save_book_trip') }}" method="post" enctype="multipart/form-data" autocomplete="off" id="book_trip_form">
                      @csrf
                      <input type="hidden" name="p_id" value="" id="p_id">
                      <input type="hidden" name="h_id" value="" id="h_id">
                      <input type="hidden" name="v_id" value="" id="v_id">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="input-box">
                              <label for="">Name *</label>
                              <input  type="text"  class="form-control"  id="name" name="name" placeholder="name" />
                              <span class="text-danger" id="nameErr2"></span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                                <label for="">phone *</label>
                              <input type="number" class="form-control"  id="phone" name="phone"   placeholder=" Phone number"/>
                              <span class="text-danger" id="phoneErr2"></span>
                             </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                             <label for="">Email *</label>
                              <input  type="email"  class="form-control"  id="email" name="email" placeholder="email" />
                              <span class="text-danger" id="emailErr2"></span>
                            </div>
                          </div>
                        
                          <div class="col-md-12">
                            <div class="input-box">
                                <label for="">Write Your Massage </label>
                              <textarea rows="4" class="form-control" placeholder="What’s on your mind" name="message"  id="message">
                              </textarea>
                            </div>
                          </div>
  
                          <div class="col-md-12">
                            <div class="submit-button-box">
                              <button type="button" id="book-trip-btn">Submit Now </button>
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
    <?php 
      $swal_session = array();
      $swalflag = 0;
      
      if(Session::has('swal_session')){
          $swal_session = session('swal_session');
          $swalflag = 1;
          Session::forget('swal_session');
      } 
    ?>

    <!-- js link -->


    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
      $('.subscribeBtn').click(function(){
      // var formID = $(this).closest("form").attr("id");
      var frm = $('#subscribeForm');
      var formData = new FormData(frm[0]);
      $.ajax({
          type: "POST",
          url: "<?php echo url('home/save_subscriber') ?>",
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          cache: 'false',

          success: function(res){
              console.log(res);
              if(res.error != undefined){
                  
                  if(res.error.email != undefined && res.error.email != ''){
                      // toastr.options.positionClass = 'toast-bottom-right';
                      toastr.error(res.error.email);
                  }
                  
              }else{
                  if(res.msg == 'success'){
                      //window.location.reload();
                      frm[0].reset();
                      toastr.success('You have successfully subscribed.');
                  }else if(res.err == 'fail'){
                      toastr.error('Something went wrong. Please try again!');
                  }
              }
          }
          });
      });
    </script>

    <script>
        var swalflag = '<?=$swalflag?>';
        var pid = '';
        var hid = '';
        var vid = '';
        function send_enquiry(pid,hid,vid){
          if(pid != ''){
            $("#p_id").val(pid);
          }
          if(hid != ''){
            $("#h_id").val(hid);
          }
          if(vid != ''){
            $("#v_id").val(vid);
          }
          $("#book_trip_form").find("span").html('');
          $("#enquiry-form").modal('show');
        }
        $('#book-trip-btn').click(function(){
          $("#book_trip_form").find("span").html('');
          var frm = $('#book_trip_form');
          var formData = new FormData(frm[0]);
          $.ajax({
              type: "POST",
              url: "<?php echo url('home/save_contact_us') ?>",
              data: formData,
              processData: false,
              contentType: false,
              dataType: 'json',
              cache: 'false',
              beforeSend: function() {
                $('#book-trip-btn').text('Sending...');
                $('#book-trip-btn').attr('disabled', true);
              },
              success: function(res){
                  console.log(res);
                  if(res.error != undefined){
                      $('#book-trip-btn').text('Submit Now');
                      $('#book-trip-btn').attr('disabled', false);
                      if(res.error.name != undefined && res.error.name != ''){
                          $('#nameErr2').html(res.error.name);
                      }
                      
                      if(res.error.phone != undefined && res.error.phone != ''){
                          $('#phoneErr2').html(res.error.phone);
                      }
                      if(res.error.email != undefined && res.error.email != ''){
                          $('#emailErr2').html(res.error.email);
                      }
                      
                  }else{
                      if(res.msg == 'success'){
                          window.location.reload();
                      }else if(res.err == 'fail'){
                          alert('Something went wrong. Please try again!');
                      }
                  }
              }
          });
        });

        $(document).ready(function(){
            toastr.options = {
                "debug": false,
                //   "positionClass": "toast-bottom-full-width",
                "positionClass": "toast-bottom-right",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            }
            if(swalflag == '1'){
                swal({
                    title: "<?=(!empty($swal_session))?$swal_session['title']:''?>",
                    text: "<?=(!empty($swal_session))?$swal_session['text']:''?>",
                    icon: "<?=(!empty($swal_session) && isset($swal_session['icon']))?$swal_session['icon']:'success'?>",
                    button: "Close",
                });
                $(".swal-text, .swal-footer").addClass('text-center');
                $(".swal-button--confirm").addClass('btn-success');
            }
        });

        $(document).ready(function () {
            $(".hero-slider").owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          dots: false,
          autoplay:true,
          autoplayTimeout: 3000,
          mouseDrag:false,
          animateIn: "fadeIn",
          animateOut: "fadeOut",
          navText : ["<i class='fa-solid fa-arrow-left-long'></i>","<i class='fa-solid fa-arrow-right-long'></i>"],
          responsiveClass: true,
          responsive: {
            0: {
              items: 1,
              nav: true,
            },
            600: {
              items: 1,
            },
            1000: {
              items: 1,
            },
          },
        });
            $(".owl-carousel1").owlCarousel({
                margin: 15,
                nav: true,
                dots: false,
                autoplay: true,
                navText : ["<i class='fa-solid fa-arrow-left'></i> PREV "," NEXT <i class='fa-solid fa-arrow-right'></i>"],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        loop: true,
                    },
                    600: {
                        items: 3,
                        nav: true,
                        loop: true,
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: true,
                    },
                },
            });

            $(".owl-carousel2").owlCarousel({
                margin: 15,
                nav: true,
                dots: false,
                autoplay:false,
                navText : ["<i class='fa-solid fa-arrow-left'></i> PREV "," NEXT <i class='fa-solid fa-arrow-right'></i>"],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        loop: true,
                    },
                    600: {
                        items: 2,
                        nav: false,
                        loop: true,
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: true,
                    },
                },
            });

            $(".testmonial-slider").owlCarousel({
                margin: 15,
                nav: true,
                dots: false,
                autoplay:false,
                navText : ["<i class='fa-solid fa-arrow-left'></i> PREV "," NEXT <i class='fa-solid fa-arrow-right'></i>"],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        loop: true,
                    },
                    600: {
                        items: 1,
                        nav: true,
                        loop: true,
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: true,
                    },
                },
            });


            
            $(window).scroll(function() {
        if ($(this).scrollTop() > 10) {
        $('.header').addClass("scroll");
        } else {
        $('.header').removeClass("scroll");
        }
        }); 

        });

        (function(){
      let words = [
          "Holiday",
          "Family",
          "Honeymoon"
          ], i = 0;
      setInterval(function(){
          $('#textchange').fadeOut(function(){
              $(this).html(words[i=(i+1)%words.length]).fadeIn();
          });
      }, 3000);
        
  })();

    </script>
    
    <script src="{{ url('public/frontassets/js/script.js') }}"></script>

</body>

</html>