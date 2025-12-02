@extends("admin._layouts.master")
@section("content")
<main id="main" class="main">

    <div class="pagetitle ">
        <div class="d-flex justify-content-between">
            <h1>{{ (isset($solo) && $solo->id)?'Edit':'Add' }} CMS</h1>
            <a href="{{ url(ADMIN.'-cms') }}" class="btn btn-primary">Back</a>
        </div>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ (isset($solo) && $solo->id)?'Edit':'Add' }}-cms</li>
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
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body py-2">
                        <?php /*<h5 class="card-title"><?=(isset($cms) && $cms->id)?'Edit':'Add'?> CMS</h5> */ ?>

                        <!-- Horizontal Form -->
                        <form class="" autocomplete="off" id="editContentForm"  action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="page" class="col-sm-2 col-form-label">Select Page</label>
                            <div class="col-sm-10">
                                <select name="page" id="page" class="form-control">
                                    <option value="">Select Page</option>
                                    <option value="privacy-policy" {{ (isset($solo) && $solo->page == 'privacy-policy') || (old('page') == 'privacy-policy')?'selected':'' }}>Privacy Policy</option>
                                    <option value="terms-condition" {{ (isset($solo) && $solo->page == 'terms-condition') || (old('page') == 'terms-condition')?'selected':'' }}>Terms & Condition</option>
                                </select>
                                @error('page')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="banner_title" class="col-sm-2 col-form-label">Banner Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="banner_title" name="banner_title" value="{{ old('banner_title', isset($solo)?$solo->banner_title:'') }}">
                                @error('banner_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <!-- <label for="description1" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="7" cols="50">{{ old('description', isset($solo)?$solo->description:'') }}</textarea>
                                
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cms_banner" class="col-sm-2 col-form-label">Banner Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="cms_banner" id="cms_banner" >
                                <input type="hidden" class="form-control" name="old_image" value="{{ isset($solo)?$solo->cms_banner:'' }}" >
                                @error('cms_banner')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <?php /* <div class="row mb-3">
                            <label for="post" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="post" name="post" value="<?=(isset($cms->post))?$cms->post:set_value('post'); ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'post') : '' ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="video_url" name="video_url" value="<?=(isset($cms->video_url))?$cms->video_url:set_value('video_url'); ?>">
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'video_url') : '' ?></span>
                            </div>
                        </div> */ ?>
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
                                @error('cms_banner')<span class="text-danger">{{ $message }}</span>@enderror
                                
                            </div>
                        </fieldset>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ url(ADMIN.'-cms') }}" class="btn btn-warning">Cancel</a>
                        </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
            @if(isset($solo) && $solo->id)
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Image</h5>
                        @php $is_image = 0; @endphp
                       
                        <div class="d-flex align-content-start flex-wrap my-2">
                            @if($solo->cms_banner != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_cms',
                                    'u_field' => 'cms_banner',
                                    'w_field' => 'id',
                                    'val' => $solo->id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->cms_banner,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->cms_banner) }} " class="" alt="cms_banner" >
                                <small class="image-title">Cms Banner</small>
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


<!-- Modal -->
<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkModalLabel">Generate Hyperlink</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="linkForm">
                    <!-- Input for Link Text -->
                    <div class="mb-3">
                        <label for="linkText" class="form-label">Link Text</label>
                        <input type="text" class="form-control" id="linkText" placeholder="Enter link text" required>
                    </div>
                    <!-- Input for URL -->
                    <div class="mb-3">
                        <label for="linkUrl" class="form-label">Link URL</label>
                        <input type="url" class="form-control" id="linkUrl" placeholder="Enter URL (e.g. https://example.com)" required>
                    </div>
                    <!-- Generate Button -->
                    <button type="button" id="generateLinkBtn" class="btn btn-primary">Generate Link</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('public/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('public/assets/ckeditor/config.js') }}"></script>
<script>
    // Initialize CKEditor
    var areas = new Array('description');
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