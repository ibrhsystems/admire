    @php 
        $segment1 = Request::segment(1);
        $segment2 = Request::segment(2);
        
    @endphp
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-dashboard')?'':'collapsed' }}" href="{{ url(ADMIN.'-dashboard') }}">
        <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <!-- <li class="nav-heading">Home</li> -->
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-testimonials')?'':'collapsed' }}" href="{{ url(ADMIN.'-testimonials') }}">
        <i class="bi bi-person"></i>
        <span>Testimonial</span>
        </a>
    </li><!-- End testimonial -->
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-cms')?'':'collapsed' }}" href="{{ url(ADMIN.'-cms') }}">
        <i class="bi bi-card-list"></i>
        <span>CMS</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-banner')?'':'collapsed' }}" href="{{ url(ADMIN.'-banner') }}">
        <i class="bi bi-card-list"></i>
        <span>Mannage Banner</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-contact_us')?'':'collapsed' }}" href="{{ url(ADMIN.'-contact_us') }}">
        <i class="bi bi-card-list"></i>
        <span>Contact Us</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-blogs')?'':'collapsed' }}" href="{{ url(ADMIN.'-blogs') }}">
        <i class="bi bi-card-list"></i>
        <span>Blog</span>
        </a>
    </li>
    <li class="nav-heading">Tour Management</li>
    @php 
        $collapsed = 'collapsed'; 
        $show = $atv1 = $atv2 = ''; 
    @endphp
    <?php if($segment1 == ADMIN.'-locations' || $segment1 == ADMIN.'-add-location' || $segment1 == ADMIN.'-edit-location' || $segment1 == ADMIN.'-packages' || $segment1 == ADMIN.'-package'){
        $collapsed = '';
        $show = 'show';
    }
    if($segment1 == ADMIN.'-locations' || $segment1 == ADMIN.'-add-location' || $segment1 == ADMIN.'-edit-location'){
        $atv1 = 'active';
    }elseif($segment1 == ADMIN.'-packages' || $segment1 == ADMIN.'-package'){
        $atv2 = 'active';
    } ?>
    <li class="nav-item">
        <a class="nav-link {{ $collapsed }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Package</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ $show }}" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ url(ADMIN.'-packages') }}" class="{{ $atv2 }}">
            <i class="bi bi-circle"></i><span>Package</span>
            </a>
        </li>
        <li>
            <a href="{{ url(ADMIN.'-locations') }}" class="{{ $atv1 }}">
            <i class="bi bi-circle"></i><span>Destinations</span>
            </a>
        </li>
        
        
        </ul>
    </li><!-- End Components Nav -->
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-visa' || $segment1 == ADMIN.'-add-visa' || $segment1 == ADMIN.'-edit-visa')?'':'collapsed' }}" href="{{ url(ADMIN.'-visa') }}">
        <i class="bi bi-card-list"></i>
        <span>Visa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-hotels' || $segment1 == ADMIN.'-hotel')?'':'collapsed' }}" href="{{ url(ADMIN.'-hotels') }}">
        <i class="bi bi-card-list"></i>
        <span>Hotel</span>
        </a>
    </li>

    <li class="nav-heading">Settings</li>
    <li class="nav-item">
        <a class="nav-link {{ ($segment1 == ADMIN.'-settings')?'':'collapsed' }}" href="{{ url(ADMIN.'-settings') }}">
        <!-- <i class="bi bi-person"></i> -->
        <i class="bi bi-gear"></i>
        <span>Settings</span>
        </a>
    </li><!-- End Settings -->

    <?php /* 
    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
        </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
        </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
        </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
        </a>
    </li><!-- End Login Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
        </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
        </a>
    </li><!-- End Blank Page Nav --> */ ?>

    </ul>

    </aside><!-- End Sidebar-->