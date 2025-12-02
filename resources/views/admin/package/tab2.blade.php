    
    <input type="hidden" name="submit" value="tab2">
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="included" class="col-form-label">Included</label>
            <textarea class="form-control" id="included" name="included" >{{ old('included',(isset($solo))?$solo->included:'') }}</textarea>
        @error('included')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="excluded" class="col-form-label">Excluded</label>
            <textarea class="form-control" id="excluded" name="excluded" >{{ old('excluded',(isset($solo))?$solo->excluded:'') }}</textarea>
        @error('excluded')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="highlights" class="col-form-label">Highlights of the Tour</label>
            <textarea class="form-control" id="highlights" name="highlights" >{{ old('highlights',(isset($solo))?$solo->highlights:'') }}</textarea>
        @error('highlights')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    
    <script src="{{ url('public/assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('public/assets/ckeditor/config.js') }}"></script>
    <script>
        // Initialize CKEditor
        var areas = new Array('included','excluded','highlights');
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