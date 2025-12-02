    
    <input type="hidden" name="submit" value="tab2">
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="pets" class="col-form-label">Pets</label>
            <input type="text" name="pets" id="pets" value="{{ old('pets',(isset($solo))?$solo->pets:'') }}" class="form-control">
            @error('pets')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="children" class="col-form-label">Children and extra beds</label>
            <textarea class="form-control" id="children" name="children" >{{ old('children',(isset($solo))?$solo->children:'') }}</textarea>
        @error('children')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="highlights" class="col-form-label">Highlights</label>
            @php $heilightArr = (isset($solo) && $solo->highlights != '')?json_decode($solo->highlights):[]; @endphp
            @if(!empty($heilight))
            @foreach($heilight as $k=>$list)
            @php
                $checked = (in_array($list->id,$heilightArr))?'checked':''; 
            @endphp
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="highlights{{ $k }}" name="highlights[]" value="{{ $list->id }}"{{ $checked }}>
                <label class="form-check-label" for="highlights{{ $k }}">{{ $list->name }}</label>
            </div>
            @endforeach
            @endif
            
            @error('highlights.0')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="facilities" class="col-form-label">Facilities</label>
            @php $facilityArr = (isset($solo) && $solo->facilities != '')?json_decode($solo->facilities):[]; @endphp
            @if(!empty($facilities))
            @foreach($facilities as $k=>$list)
            @php
                $checked = (in_array($list->id,$facilityArr))?'checked':''; 
            @endphp
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="facilities{{ $k }}" name="facilities[]" value="{{ $list->id }}" {{ $checked }}>
                <label class="form-check-label" for="facilities{{ $k }}">{{ $list->name }}</label>
            </div>
            @endforeach
            @endif
            
            @error('facilities.0')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="map_url" class="col-form-label">Map URL</label>
            <textarea class="form-control" id="map_url" name="map_url" rows="5">{{ old('map_url',(isset($solo))?$solo->map_url:'') }}</textarea>
        @error('map_url')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    
    <script src="{{ url('public/assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('public/assets/ckeditor/config.js') }}"></script>
    <script>
        // Initialize CKEditor
        var areas = new Array('children');
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