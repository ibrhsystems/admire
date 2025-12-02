@extends("admin._layouts.master")
@section("content")
<main id="main" class="main">

    <div class="pagetitle ">
        <div class="d-flex justify-content-between">
            <h1>{{ (isset($solo) && $solo->id)?'Edit':'Add' }} Destination</h1>
            <a href="{{ url(ADMIN.'-locations') }}" class="btn btn-primary">Back</a>
        </div>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ (isset($solo) && $solo->id)?'Edit':'Add' }}-Destination</li>
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
                    <div class="card-body py-2">
                        <?php /*<h5 class="card-title"><?=(isset($cms) && $cms->id)?'Edit':'Add'?> CMS</h5> */ ?>

                        <!-- Horizontal Form -->
                        <form class="" autocomplete="off" id="editContentForm"  action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Destination Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($solo)?$solo->name:'') }}">
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="url" class="col-sm-2 col-form-label">URL<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="url" name="url" value="{{ old('url', isset($solo)?$solo->url:'') }}">
                                @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Type<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="Domestic" {{ ((isset($solo) && $solo->type == 'Domestic') || old('type') == 'Domestic')?'selected':'' }}>Domestic</option>
                                    <option value="International" {{ ((isset($solo) && $solo->type == 'International') || old('type') == 'International')?'selected':'' }}>International</option>
                                </select>
                                @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($solo)?$solo->title:'') }}">
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="description" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" >{{ old('description',(isset($solo))?$solo->description:'') }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Primary Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" >
                                <input type="hidden" class="form-control" name="old_image" value="{{ isset($solo)?$solo->image:'' }}" >
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="image2" class="col-sm-2 col-form-label">Image 2</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image2" id="image2" >
                                <input type="hidden" class="form-control" name="old_image2" value="{{ isset($solo)?$solo->image2:'' }}" >
                                @error('image2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image3" class="col-sm-2 col-form-label">Image 3</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image3" id="image3" >
                                <input type="hidden" class="form-control" name="old_image3" value="{{ isset($solo)?$solo->image3:'' }}" >
                                @error('image3')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image4" class="col-sm-2 col-form-label">Image 4</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image4" id="image4" >
                                <input type="hidden" class="form-control" name="old_image4" value="{{ isset($solo)?$solo->image4:'' }}" >
                                @error('image4')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image5" class="col-sm-2 col-form-label">Image 5</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image5" id="image5" >
                                <input type="hidden" class="form-control" name="old_image5" value="{{ isset($solo)?$solo->image5:'' }}" >
                                @error('image5')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image6" class="col-sm-2 col-form-label">Image 6</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image6" id="image6" >
                                <input type="hidden" class="form-control" name="old_image6" value="{{ isset($solo)?$solo->image6:'' }}" >
                                @error('image6')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title2" class="col-sm-2 col-form-label">Title2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title2" name="title2" value="{{ old('title2', isset($solo)?$solo->title2:'') }}">
                                @error('title2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="description" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="description2" class="col-form-label">Description2</label>
                                <textarea class="form-control" id="description2" name="description2" >{{ old('description2',(isset($solo))?$solo->description2:'') }}</textarea>
                                @error('description2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="description" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="points" class="col-form-label">Points</label>
                                <textarea class="form-control" id="points" name="points" >{{ old('points',(isset($solo))?$solo->points:'') }}</textarea>
                                @error('points')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
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
                        </fieldset>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ url(ADMIN.'-locations') }}" class="btn btn-warning">Cancel</a>
                        </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
            @if(isset($solo) && $solo->id)
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Image</h5>
                        @php $is_image = 0; @endphp
                       
                        <div class="d-flex align-content-start flex-wrap my-2">
                            @if($solo->image != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_locations',
                                    'u_field' => 'image',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->image,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->image) }} " class="" alt="image" >
                                <small class="image-title">Primary Image</small>
                            </div>
                            @endif
                            @if($solo->image2 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_locations',
                                    'u_field' => 'image2',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->image2,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->image2) }} " class="" alt="image" >
                                <small class="image-title">Image2</small>
                            </div>
                            @endif
                            @if($solo->image3 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_locations',
                                    'u_field' => 'image3',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->image3,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->image3) }} " class="" alt="image" >
                                <small class="image-title">Image3</small>
                            </div>
                            @endif
                            @if($solo->image4 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_locations',
                                    'u_field' => 'image4',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->image4,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->image4) }} " class="" alt="image" >
                                <small class="image-title">Image4</small>
                            </div>
                            @endif
                            @if($solo->image5 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_locations',
                                    'u_field' => 'image5',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->image5,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->image5) }} " class="" alt="image" >
                                <small class="image-title">Image5</small>
                            </div>
                            @endif
                            @if($solo->image6 != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_locations',
                                    'u_field' => 'image6',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->image6,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->image6) }} " class="" alt="image" >
                                <small class="image-title">Image6</small>
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
<script src="{{ url('public/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('public/assets/ckeditor/config.js') }}"></script>
<script>
    $("body").on("keyup","#name", function(event){	
        var urlval = $(this).val();
        var newurl = urlval.replace(/[_\s]/g, '-').replace(/[^a-z0-9-\s]/gi, '');
        $('#url').val(newurl.toLowerCase());
    });
    // Initialize CKEditor
    var areas = new Array('description','description2','points');
    $.each(areas, function(i, area){
        CKEDITOR.replace(area, {
            // Optional configurations
            height: 300,
            customConfig: '{{ url("public/assets/ckeditor/config.js") }}', // Custom config file path
            // filebrowserUploadUrl: '{{ url("public/assets/ckeditor/upload.php") }}',
            // filebrowserUploadMethod: 'form'
        });
    });
</script>

@endsection()