    <script src="{{ url('public/assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('public/assets/ckeditor/config.js') }}"></script>
    <script>
        function add_ckeditor(area){
            CKEDITOR.replace(area, {
                height: 200,
                customConfig: '{{ url("public/assets/ckeditor/config.js") }}', // Custom config file path
                // filebrowserUploadUrl: '{{ url("public/assets/ckeditor/upload.php") }}',
                // filebrowserUploadMethod: 'form'
            });
        }
    </script>

    <input type="hidden" name="submit" value="tab3">
    <div class="iti-Sections">
        @if(isset($solo) && $solo->other_features != '')
        @php $itiArr = json_decode($solo->other_features); $n=1; @endphp
        @foreach($itiArr as $k=>$iti)
        <div class="iti-single {{ ($n > 1)?'mt-2':'' }}">
            <div class="row mb-3">
                <label for="f_title{{ $n }}" class="col-sm-2 col-form-label">Title{{ $n }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="f_title{{ $n }}" name="f_title[]" value="{{ $iti }}">
                    @error('f_title.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>
                @if($n > 1)
                <button type="button" class="btn btn-danger me-2 removesection">Remove</button>
                
                @endif
            </div>
        </div>
        @php $n++; @endphp
        @endforeach
        @else
        <div class="iti-single">
            <div class="row mb-3">
                <label for="f_title1" class="col-sm-2 col-form-label">Features1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="f_title1" name="f_title[]" value="{{ old('f_title.0') }}">
                    @error('f_title.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>
            </div>
        </div>
        @endif
    </div>
    <div class="row mb-3 mt-3">
        <label for="other_text1" class="col-sm-2 col-form-label">Other Text1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="other_text1" name="other_text1" value="{{ old('other_text1', (isset($solo))?$solo->other_text1:'') }}">
            @error('other_text1')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <label for="other_text2" class="col-sm-2 col-form-label">Other Text2</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="other_text2" name="other_text2" value="{{ old('other_text2', (isset($solo))?$solo->other_text2:'') }}">
            @error('other_text2')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    
    <script>
        var secno = <?=isset($n)?$n:2?>;
        
        function add_section(){
            var sectionHtml = '<div class="iti-single mt-2">'+
                '<div class="row mb-3">'+
                    '<label for="f_title'+secno+'" class="col-sm-2 col-form-label">Features'+secno+'</label>'+
                    '<div class="col-sm-10">'+
                        '<input type="text" class="form-control" id="f_title'+secno+'" name="f_title[]" value="">'+
                    '</div>'+
                '</div>'+
                
                '<div class="d-flex justify-content-end">'+
                    '<button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>'+
                    '<button type="button" class="btn btn-danger me-2 removesection">Remove</button>'+
                '</div>'+
            '</div>';
            $(".iti-Sections").append(sectionHtml);
            
            secno++;
        }
        $(".iti-Sections").on("click", ".removesection", function() {
            var isConfirmed = confirm("Are you sure?");
            if (isConfirmed) {
                $(this).closest(".iti-single").remove();
            }
        });
        
    </script>