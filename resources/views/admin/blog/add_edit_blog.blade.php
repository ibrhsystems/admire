@extends("admin._layouts.master")
@section("content")
<main id="main" class="main">

    <div class="pagetitle ">
        <div class="d-flex justify-content-between">
            <h1>{{ (isset($solo) && $solo->blg_id)?'Edit':'Add' }} Blog</h1>
            <a href="{{ url(ADMIN.'-blogs') }}" class="btn btn-primary">Back</a>
        </div>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ (isset($solo) && $solo->blg_id)?'Edit':'Add' }}-blog</li>
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
                            <label for="catid" class="col-sm-2 col-form-label">Blog Category</label>
                            <div class="col-sm-10">
                                <select name="catid" id="catid" class="form-control">
                                    <option value="">Select Category</option>
                                    @if(!empty($category))
                                        @foreach($category as $list)
                                            <option value="{{ $list->catid }}" {{ (isset($solo) && $solo->catid == $list->catid) || (old('catid') == $list->catid)?'selected':'' }}>{{ $list->cat_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('catid')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="blog_title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ old('blog_title', isset($solo)?$solo->blog_title:'') }}">
                                @error('blog_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="blog_url" class="col-sm-2 col-form-label">Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="blog_url" name="blog_url" value="{{ old('blog_url', isset($solo)?$solo->blog_url:'') }}">
                                @error('blog_url')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <!-- <label for="description1" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="short_desc" class="form-label">Short Details for list page</label>
                                <textarea class="form-control" id="short_desc" name="short_desc" rows="7" cols="50">{{ old('short_desc', isset($solo)?$solo->short_desc:'') }}</textarea>
                                
                                @error('short_desc')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="description1" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="blog_details" class="form-label">blog_details</label>
                                <textarea class="form-control" id="blog_details" name="blog_details" rows="7" cols="50">{{ old('blog_details', isset($solo)?$solo->blog_details:'') }}</textarea>
                                
                                @error('blog_details')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="blog_image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="blog_image" id="blog_image" >
                                <input type="hidden" class="form-control" name="old_image" value="{{ isset($solo)?$solo->blog_image:'' }}" >
                                @error('blog_image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', isset($solo)?$solo->meta_title:'') }}">
                                @error('meta_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{ old('meta_description', isset($solo)?$solo->meta_description:'') }}">
                                @error('meta_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword', isset($solo)?$solo->meta_keyword:'') }}">
                                @error('meta_keyword')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="post_date" class="col-sm-2 col-form-label">Posted At</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="post_date" name="post_date" value="{{ old('post_date', isset($solo)?$solo->post_date:'') }}">
                                @error('post_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="blog_added_by" class="col-sm-2 col-form-label">Added By</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="blog_added_by" name="blog_added_by" value="{{ old('blog_added_by', isset($solo)?$solo->blog_added_by:'') }}">
                                @error('blog_added_by')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tot_views" class="col-sm-2 col-form-label">Total Views</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="tot_views" name="tot_views" value="{{ old('tot_views', isset($solo)?$solo->tot_views:'') }}">
                                @error('tot_views')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="blog_status" id="blog_status" value="Y" checked>
                                    <label class="form-check-label" for="blog_status">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="blog_status" id="blog_status2" value="N" {{ ((isset($solo) && $solo->blog_status == 'N') || old('blog_status') == 'N')?'checked':'' }}>
                                    <label class="form-check-label" for="blog_status2">
                                    Inactive
                                    </label>
                                </div>
                                @error('blog_status')<span class="text-danger">{{ $message }}</span>@enderror
                                
                            </div>
                        </fieldset>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ url(ADMIN.'-blogs') }}" class="btn btn-warning">Cancel</a>
                        </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
            @if(isset($solo) && $solo->blg_id)
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Image</h5>
                        @php $is_image = 0; @endphp
                       
                        <div class="d-flex align-content-start flex-wrap my-2">
                            @if($solo->blog_image != '') 
                            @php $is_image = 1; @endphp
                            <div class="img-box my-2">
                            <?php 
                                $delConfig = array(
                                    'table' => 'tbl_blog',
                                    'u_field' => 'blog_image',
                                    'w_field' => 'blg_id',
                                    'val' => $solo->blg_id,
                                    'url' => url()->current(),
                                    'old_image' => $solo->blog_image,
                                );
                                $delConfig = base64_encode(json_encode($delConfig)); 
                            ?>
                                <span class="cancel-icon"><a href="{{ url('admin/remove_image/'.$delConfig) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-x-lg" title="Cancel Image"></i></a></span>
                                <img src="{{ url(IMAGE_PATH.$solo->blog_image) }} " class="" alt="image" >
                                <small class="image-title">Blog Image</small>
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
    var areas = new Array('blog_details');
    $.each(areas, function(i, area){
        CKEDITOR.replace(area, {
            // Optional configurations
            height: 300,
            customConfig: '{{ url("public/assets/ckeditor/config.js") }}', // Custom config file path
            // filebrowserUploadUrl: '{{ url("public/assets/ckeditor/upload.php") }}',
            // filebrowserUploadMethod: 'form'
        });
    });
    $("body").on("keyup","#blog_title", function(event){	
        var urlval = $(this).val();
        var newurl = urlval.replace(/[_\s]/g, '-').replace(/[^a-z0-9-\s]/gi, '');
        $('#blog_url').val(newurl.toLowerCase());
    });
</script>

@endsection()