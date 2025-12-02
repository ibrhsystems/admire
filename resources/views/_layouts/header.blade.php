@php 
    $commonmodel = new App\Models\Common_model;
    $segment1 = Request::segment(1);
@endphp
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('public/frontassets/images/admire-logo (1).png') }}" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="fa-solid fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ ($segment1 == '')?'active':'' }}" href="{{ url('/') }}">Home</a>
                            </li>
  
                            <li class="nav-item">
                                <a class="nav-link {{ ($segment1 == 'about-us')?'active':'' }}" href="{{ url('/about-us') }}">About Us</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ ($segment1 == 'package-list')?'active':'' }}" data-bs-auto-close="outside" href="{{ url('/package-list') }}">Tour <i class="fa-solid fa-plus"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="dropend dropdown"><a class="dropdown-item dropdown-toggle" href="{{ url('/domestic-tour') }}">Domestic tour</a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            @php $d_locations = $commonmodel->getAllRecord('tbl_locations',['type'=>'Domestic'],['name','ASC']); @endphp
                                            @if(sizeof($d_locations))
                                            @foreach($d_locations as $list)
                                            <li><a href="{{ url('package-list/'.$list->url) }}" class="dropdown-item">{{ $list->name }}</a></li>
                                            @endforeach
                                            @else
                                                <li><a href="javascript:void(0)" class="dropdown-item">No List</a></li>
                                            @endif
                                            <!-- <li><a href="package-details.html" class="dropdown-item">package details</a></li> -->
                                        </ul>
                                    </li>
                                    <li class="dropend dropdown"><a class="dropdown-item dropdown-toggle" href="{{ url('/international-tour') }}">International tour</a>
                                        <ul class="dropdown-menu dropdown-submenu">
                                            @php $i_locations = $commonmodel->getAllRecord('tbl_locations',['type'=>'International'],['name','ASC']); @endphp
                                            @if(sizeof($i_locations))
                                            @foreach($i_locations as $list)
                                            <li><a href="{{ url('package-list/'.$list->url) }}" class="dropdown-item">{{ $list->name }}</a></li>
                                            @endforeach
                                            @else
                                                <li><a href="javascript:void(0)" class="dropdown-item">No List</a></li>
                                            @endif
                                            <!-- <li><a href="#" class="dropdown-item">another action</a></li>
                                            <li><a href="#" class="dropdown-item">some things else here</a></li> -->
                                        </ul>
                                    </li>
                                </ul>
                            </li>
  
                            <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle {{ ($segment1 == 'destination')?'active':'' }}" href="{{ url('/destination') }}" id="navbarDropdown" role="button"
                                   aria-expanded="false">
                                   Destination
                               <!-- <i class="fa-solid fa-plus"></i> -->
                               </a>
                              
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ ($segment1 == 'visa')?'active':'' }}" href="{{ url('/visa') }}" id="navbarDropdown" role="button" aria-expanded="false">
                                    visa
                                <!-- <i class="fa-solid fa-plus"></i> -->
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link {{ ($segment1 == 'hotel')?'active':'' }}" href="{{ url('/hotel') }}">Hotel <i class="fa-solid fa-plus"></i> </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @php $hotels = $commonmodel->getAllRecord('tbl_hotel',['status'=>'Y']); @endphp
                                @if(sizeof($hotels))
                                @foreach($hotels as $li)
                                    <li><a class="dropdown-item" href="{{ url('/hotel/'.$li->url) }}">{{ $li->hotel_title }}</a></li>
                                @endforeach
                                @else
                                    <li><a href="javascript:void(0)" class="dropdown-item">No List</a></li>
                                @endif
                                </ul>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link {{ ($segment1 == 'contact')?'active':'' }}" href="{{ url('/contact') }}">contact</a>
                            </li>
                        </ul>
                            <a href="javascript:void(0)" onclick="send_enquiry()" class="book-btn omman-btn-hover"> book a trip </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>