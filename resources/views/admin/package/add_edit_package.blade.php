@extends("admin._layouts.master")
@section("content")
<main id="main" class="main">
<?php 
    $segment2 = Request::segment(2);
    $config = json_decode(base64_decode($segment2),true);
    $active_tab = 1;
    if($config['tab'] == 2){
        $active_tab = 2;
    }elseif($config['tab'] == 3){
        $active_tab = 3;
    }elseif($config['tab'] == 4){
        $active_tab = 4;
    }elseif($config['tab'] == 5){
        $active_tab = 5;
    }elseif($config['tab'] == 6){
        $active_tab = 6;
    }
    $tour_title = '';
    if(isset($solo) && $solo->p_id){
        $config['id'] = $solo->p_id;
        $tour_title = $solo->tour_title;
    }
    // $config = base64_encode(json_encode($config));
?>
    <div class="pagetitle ">
        <div class="d-flex justify-content-between">
            <h1>{{ (isset($solo) && $solo->p_id)?'Edit':'Add' }} Package ({{ $tour_title }})</h1>
            <a href="{{ url(ADMIN.'-packages') }}" class="btn btn-primary">Back</a>
        </div>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ (isset($solo) && $solo->p_id)?'Edit':'Add' }}-package</li>
            </ol>
        </nav>
        <?php if(Session::has('message')){ 
            echo '<h5 class="card-title">'.
                alertBS(session('message')['msg'], session('message')['type']).
            '</h5>';
        } ?>
    </div><!-- End Page Title -->

    <section class="section ">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-start">
                            @php $config['tab'] = 1; @endphp
                            <a href="{{ url(ADMIN.'-package/'.base64_encode(json_encode($config))) }}" class="btn btn-outline-dark me-1 {{ ($active_tab == 1)?'active':'' }}">Basic</a>
                            @php $config['tab'] = 2; @endphp
                            <a href="{{ url(ADMIN.'-package/'.base64_encode(json_encode($config))) }}" class="btn btn-outline-dark me-1 {{ ($active_tab == 2)?'active':'' }}">Features</a>
                            @php $config['tab'] = 3; @endphp
                            <a href="{{ url(ADMIN.'-package/'.base64_encode(json_encode($config))) }}" class="btn btn-outline-dark me-1 {{ ($active_tab == 3)?'active':'' }}">Itinerary</a>
                            @php $config['tab'] = 4; @endphp
                            <a href="{{ url(ADMIN.'-package/'.base64_encode(json_encode($config))) }}" class="btn btn-outline-dark me-1 {{ ($active_tab == 4)?'active':'' }}">Faq</a>
                            @php $config['tab'] = 5; @endphp
                            <a href="{{ url(ADMIN.'-package/'.base64_encode(json_encode($config))) }}" class="btn btn-outline-dark me-1 {{ ($active_tab == 5)?'active':'' }}">Others</a>
                            @php $config['tab'] = 6; @endphp
                            <a href="{{ url(ADMIN.'-package/'.base64_encode(json_encode($config))) }}" class="btn btn-outline-dark me-1 {{ ($active_tab == 6)?'active':'' }}">Publish</a>
                        </div>
                    </div>
                    <div class="card-body py-2">
                        <?php /*<h5 class="card-title"><?=(isset($cms) && $cms->id)?'Edit':'Add'?> CMS</h5> */ ?>

                        <!-- Horizontal Form -->
                        <form class="" autocomplete="off" id="editContentForm"  action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                        @csrf
                            @if($active_tab == 1)
                                @include('admin.package.tab1')
                            @elseif($active_tab == 2)
                                @include('admin.package.tab2')
                            @elseif($active_tab == 3)
                                @include('admin.package.tab3')
                            @elseif($active_tab == 4)
                                @include('admin.package.tab4')
                            @elseif($active_tab == 5)
                                @include('admin.package.tab5')
                            @elseif($active_tab == 6)
                                @include('admin.package.tab6')
                            @endif
                        <?php /* <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Y" checked>
                                    <label class="form-check-label" for="status">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="N" {{ ((isset($solo) && $solo->status == 'N') || old('status') == 'N')?'checked':'' }}>
                                    <label class="form-check-label" for="status2">
                                    Inactive
                                    </label>
                                </div>
                                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                
                            </div>
                        </fieldset> */ ?>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ url(ADMIN.'-packages') }}" class="btn btn-warning">Cancel</a>
                        </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
            @if(isset($solo) && $solo->p_id)
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Image</h5>
                        @php $is_image = 0; @endphp
                       
                        <div class="d-flex align-content-start flex-wrap my-2">
                            <!-- image1 -->
                            @if($solo->tour_image != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_package',
                                    'u_field' => 'tour_image',
                                    'w_field' => 'p_id',
                                    'val' => $solo->p_id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->tour_image,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->tour_image) }} " class="" alt="primary image" >
                                <small class="image-title">Primary Image</small>
                            </div>
                            @endif
                            <!-- image2 -->
                            @if($solo->tour_image2 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_package',
                                    'u_field' => 'tour_image2',
                                    'w_field' => 'p_id',
                                    'val' => $solo->p_id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->tour_image2,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->tour_image2) }} " class="" alt="image2" >
                                <small class="image-title">Image2</small>
                            </div>
                            @endif
                            <!-- image3 -->
                            @if($solo->tour_image3 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_package',
                                    'u_field' => 'tour_image3',
                                    'w_field' => 'p_id',
                                    'val' => $solo->p_id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->tour_image3,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->tour_image3) }} " class="" alt="image3" >
                                <small class="image-title">Image3</small>
                            </div>
                            @endif
                            <!-- image4 -->
                            @if($solo->tour_image4 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_package',
                                    'u_field' => 'tour_image4',
                                    'w_field' => 'p_id',
                                    'val' => $solo->p_id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->tour_image4,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->tour_image4) }} " class="" alt="image4" >
                                <small class="image-title">Image4</small>
                            </div>
                            @endif
                            <!-- image5 -->
                            @if($solo->tour_image5 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_package',
                                    'u_field' => 'tour_image5',
                                    'w_field' => 'p_id',
                                    'val' => $solo->p_id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->tour_image5,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->tour_image5) }} " class="" alt="image5" >
                                <small class="image-title">Image5</small>
                            </div>
                            @endif
                        </div>
                        @if(! $is_image)
                            <p class="text-danger text-center">No Image upload</p>
                        @endif

                    </div>
                </div>
            @endif
            
            </div>

        </div>
    </section>

</main><!-- End #main -->



@endsection()