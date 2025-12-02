@extends("admin._layouts.master")
@section("content")

<main id="main" class="main">

    <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url(ADMIN.'-dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
    <?php if(Session::has('message')){ 
        echo alertBS(session('message')['msg'], session('message')['type']);
    } ?>
    </div><!-- End Page Title -->

    <section class="section profile">
    <div class="row">
        <div class="col-xl-4">

        <div class="card">
           
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ url(ASSETS_URL.'/image/users/'.session('image')) }}" alt="Profile" width="120px" height="120px" style="border-radius:50%">
            <h2>{{ session('name') }} </h2>
            <!-- <h3>Web Designer</h3> -->
            <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> -->
            </div>
        </div>

        </div>

        <div class="col-xl-8">

        <div class="card">
            <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!-- <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li> -->

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <!-- <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{ session('name') }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ session('email') }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ session('phone') }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{ session('address') }}</div>
                </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form class="" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-4 col-lg-5">
                            <img src="{{ url(ASSETS_URL.'/image/users/'.session('image')) }}" alt="Profile" width="60px" height="60px">
                            <div class="pt-2">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="name" value="{{ old('name', isset($profile)?$profile->name:'') }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email', isset($profile)?$profile->email:'') }}">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone', isset($profile)?$profile->phone:'') }}">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="address" type="text" class="form-control" id="address" value="{{ old('address', isset($profile)?$profile->address:'') }}">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <input type="hidden" name="submit" value="profile">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form class="" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                    <label for="oldpwd" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="oldpwd" type="oldpwd" value="{{ old('oldpwd') }}" class="form-control" id="oldpwd">
                        @error('oldpwd')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="pwd" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="pwd" type="password" class="form-control" id="pwd" value="{{ old('pwd') }}">
                        @error('pwd') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cpwd" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="cpwd" type="password" class="form-control" id="cpwd" value="{{ old('cpwd') }}" >
                            @error('cpwd') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>  
                    </div>
                    <input type="hidden" name="submit" value="change_password">
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form><!-- End Change Password Form -->

                </div>

            </div><!-- End Bordered Tabs -->

            </div>
        </div>

        </div>
    </div>
    </section>

</main><!-- End #main -->

@endsection()