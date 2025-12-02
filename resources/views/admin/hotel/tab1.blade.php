    
    <input type="hidden" name="submit" value="basic">
    <div class="row mb-3">
        <label for="hotel_title" class="col-sm-2 col-form-label">Hotel Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="hotel_title" name="hotel_title" value="{{ old('hotel_title',(isset($solo))?$solo->hotel_title:'') }}">
            @error('hotel_title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="url" class="col-sm-2 col-form-label">Url</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url',(isset($solo))?$solo->url:'') }}">
            @error('url')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <?php /* <div class="row mb-3">
        <label for="destination" class="col-sm-2 col-form-label">Destination</label>
        <div class="col-sm-10">
            <select name="destination" id="destination" class="form-control">
                <option value="">Select Destination</option>
                @if(!empty($destinations))
                @foreach($destinations as $list)
                    @php $sel = ''; @endphp
                    @if((isset($solo) && $solo->destination == $list->id) || (old('destination') == $list->id))
                    @php $sel = 'selected'; @endphp
                    @endif
                    <option value="{{ $list->id }}" {{ $sel }}>{{ $list->name }}</option>
                @endforeach
                @endif
            </select>
            @error('destination')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div> */ ?>
    
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
        <label for="ti_alt" class="col-sm-2 col-form-label">Alt Text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="ti_alt" name="ti_alt" value="{{ old('ti_alt',(isset($solo))?$solo->ti_alt:'') }}">
            @error('ti_alt')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="ti_title" class="col-sm-2 col-form-label">Title Text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="ti_title" name="ti_title" value="{{ old('ti_title',(isset($solo))?$solo->ti_title:'') }}">
            @error('ti_title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address',(isset($solo))?$solo->address:'') }}">
            @error('address')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="price_text" class="col-sm-2 col-form-label">Price Text for Detail-Page</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="price_text" name="price_text" value="{{ old('price_text',(isset($solo))?$solo->price_text:'') }}">
            @error('price_text')<span class="text-danger">{{ $message }}</span>@enderror
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
    <p class="text-danger">Meta Properties</p>
    <div class="row mb-3">
        <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title',(isset($solo))?$solo->meta_title:'') }}">
            @error('meta_title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword',(isset($solo))?$solo->meta_keyword:'') }}">
            @error('meta_keyword')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="meta_description" name="meta_description" rows="5">{{ old('meta_description',(isset($solo))?$solo->meta_description:'') }}</textarea>
            @error('meta_description')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>

    <script src="{{ url('public/assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('public/assets/ckeditor/config.js') }}"></script>
    <script>
        $("body").on("keyup","#hotel_title", function(event){	
            var urlval = $(this).val();
            var newurl = urlval.replace(/[_\s]/g, '-').replace(/[^a-z0-9-\s]/gi, '');
            $('#url').val(newurl.toLowerCase());
        });
    
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