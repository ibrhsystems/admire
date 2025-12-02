@extends("admin._layouts.master")
@section("content")
<main id="main" class="main">
    <div class="pagetitle ">
        <div class="d-flex justify-content-between">
            <h1>{{ (isset($solo) && $solo->id)?'Edit':'Add' }} Testimonial</h1>
            <a href="{{ url(ADMIN.'-testimonials') }}" class="btn btn-primary">Back</a>
        </div>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ (isset($solo) && $solo->id)?'Edit':'Add' }}-Testimonial</li>
            </ol>
        </nav>
        @php if(Session::has('message')){ 
            echo alertBS(session('message')['msg'], session('message')['type']);
        } @endphp
    </div><!-- End Page Title -->
    <section class="section ">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body py-2">
                        <?php /* <h5 class="card-title"><?=(isset($testimonial) && $testimonial->id)?'Edit':'Add'?> Testimonial</h5> */?>
                        <!-- Horizontal Form -->
                        <form class="" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($solo)?$solo->name:'') }}">
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="7" cols="50">{{ old('description', isset($solo)?$solo->description:'') }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="logo" id="logo" >
                                <input type="hidden" class="form-control" name="old_image" value="{{ isset($solo)?$solo->logo:'' }}" >
                                @error('logo')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="post" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="post" name="post" value="{{ old('post', isset($solo)?$solo->post:'') }}">
                                @error('post')<span class="text-danger">{{ $message }}</span>@enderror
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
                            <a href="{{ url(ADMIN.'-testimonials') }}" class="btn btn-warning">Cancel</a>
                        </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
            @php if(isset($solo) && $solo->id){ @endphp
            <div class="col-lg-4">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Image</h5>
                        @php if($solo->logo != ''){ @endphp
                        <img src="{{ url(IMAGE_PATH.$solo->logo) }}" class="card-img-top" alt="..." height="300px" width="100%">
                        <div class="d-flex justify-content-between my-2">
                            <h5 class="text-dark">Testimonial image</h5>
                            <!-- <a href="javascript:void(0);" class="btn btn-outline-danger" onclick="return confirm('Are u sure?')" title="Remove Image"><i class="bi bi-trash"></i></a> -->
                        </div>
                        @php }else{ @endphp
                            <p class="text-danger text-center">No Image upload</p>
                        @php } @endphp
                    </div>
                </div>
            </div>
            @php } @endphp
        </div>
    </section>
</main><!-- End #main -->
@endsection()