@extends("_layouts.main")
@section("content")
    <!-- banner section start -->
    @php
        $url = url('public/frontassets/images/about-banner-bg.jpg');
        if(isset($cms) && $cms->cms_banner != ''){
            $url = url(IMAGE_PATH.$cms->cms_banner);
        }
    @endphp
    <section class="about-bannner" style="background-image: url({{ $url }})">
        <div class="banner-content">
            <h1>{{ $cms->banner_title??'' }} </h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a> <i class="fa-solid fa-arrow-right-long"></i> </li>
                <li>{{ $cms->banner_title??'' }}</li>
            </ul>
        </div>
    </section>
    <!-- banner section end -->

    <!-- hotel details section start -->
    <section class="hotel-details-section">
        <div class="container">
            {!! $cms->description??'' !!}
        </div>
    </section>
    <!-- hotel details section end -->

@endsection()