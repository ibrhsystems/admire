@extends("admin._layouts.master")
@section("content")
<main id="main" class="main">

    <div class="pagetitle ">
        <div class="d-flex justify-content-between">
            <h1>{{ (isset($solo) && $solo->id)?'Edit':'Add' }} Visa</h1>
            <a href="{{ url(ADMIN.'-visa') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i></a>
        </div>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ (isset($solo) && $solo->id)?'Edit':'Add' }}-visa</li>
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
                            <label for="visa_name" class="col-sm-2 col-form-label">Visa Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="visa_name" name="visa_name" value="{{ old('visa_name', isset($solo)?$solo->visa_name:'') }}">
                                @error('visa_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" >
                                <input type="hidden" class="form-control" name="old_image" value="{{ isset($solo)?$solo->image:'' }}" >
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select One</option>
                                    @if(!empty($countries))
                                    @foreach($countries as $list)
                                    @php $sel = '';
                                    if((isset($solo) && $solo->country == $list->countries_id) || (old('country') == $list->countries_id)){ $sel = 'selected'; } @endphp
                                    <option value="{{ $list->countries_id }}" {{ $sel }}>{{ $list->countries_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                
                                @error('country')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        
                        <?php /* <div class="row mb-3">
                            <!-- <label for="description1" class="col-sm-2 col-form-label">Description</label> -->
                            <div class="col-sm-12">
                                <label for="blog_details" class="form-label">blog_details</label>
                                <textarea class="form-control" id="blog_details" name="blog_details" rows="7" cols="50">{{ old('blog_details', isset($solo)?$solo->blog_details:'') }}</textarea>
                                
                                @error('blog_details')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div> */ ?>
                        
                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Visa Type</label>
                            <div class="col-sm-10">
                                <?php /* <select name="type" id="type" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="Tourist" selected>Tourist</option>
                                </select> */ ?>
                                <input type="text" class="form-control" id="type" name="type" value="{{ old('type', isset($solo)?$solo->type:'') }}">
                                @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mode" class="col-sm-2 col-form-label">Visa Mode</label>
                            <div class="col-sm-10">
                                <select name="mode" id="mode" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="Electronic" selected>Electronic</option>
                                </select>
                                @error('mode')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="max_stays" class="col-sm-2 col-form-label">Maximum stays</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="max_stays" name="max_stays" value="{{ old('max_stays', isset($solo)?$solo->max_stays:'') }}">
                                @error('max_stays')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="process_time" class="col-sm-2 col-form-label">Processing Time</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="process_time" name="process_time" value="{{ old('process_time', isset($solo)?$solo->process_time:'') }}">
                                @error('process_time')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="start_from" class="col-sm-2 col-form-label">Starting From</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="start_from" name="start_from" value="{{ old('start_from', isset($solo)?$solo->start_from:'') }}">
                                @error('start_from')<span class="text-danger">{{ $message }}</span>@enderror
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
                            <a href="{{ url(ADMIN.'-visa') }}" class="btn btn-warning">Cancel</a>
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
                                    'table' => 'tbl_visa',
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
                                <small class="image-title">Image</small>
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
 

<script>
document.getElementById('generateLinkBtn').addEventListener('click', function() {
    // Get values from the input fields
    var linkText = document.getElementById('linkText').value;
    var linkUrl = document.getElementById('linkUrl').value;

    // Validate inputs
    if (linkText.trim() === "" || linkUrl.trim() === "") {
        alert("Both fields are required.");
        return;
    }

    // Create the hyperlink
    var hyperlink = `<a href="${linkUrl}" target="_blank">${linkText}</a>`;

    // Display the generated link in the output div
    var outputDiv = document.getElementById('generatedLinkOutput');
    outputDiv.innerHTML = hyperlink;

    // Show the copy button
    // var copyButton = document.getElementById('copyLinkBtn');
    // copyButton.style.display = 'block';

    // Close the modal
    var modalElement = document.getElementById('linkModal');
    var modalInstance = bootstrap.Modal.getInstance(modalElement);
    modalInstance.hide();
});

// Copy the generated link to clipboard when copy button is clicked
// document.getElementById('copyLinkBtn').addEventListener('click', function() {
//     var generatedLinkHtml = document.getElementById('generatedLinkOutput').innerHTML;

//     // Copy the link to the clipboard
//     navigator.clipboard.writeText(generatedLinkHtml)
//         .then(function() {
//             alert('Link copied to clipboard!');
//         })
//         .catch(function(error) {
//             console.error('Failed to copy the link:', error);
//         });
// });
</script>
@endsection()