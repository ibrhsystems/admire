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
        @if(isset($solo) && $solo->itinerary != '')
        @php $itiArr = json_decode($solo->itinerary); $n=1; @endphp
        @foreach($itiArr as $k=>$iti)
        <div class="iti-single {{ ($n > 1)?'mt-2':'' }}">
            <div class="row mb-3">
                <label for="iti_title{{ $n }}" class="col-sm-2 col-form-label">Title{{ $n }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="iti_title{{ $n }}" name="iti_title[]" value="{{ $iti->title }}">
                    @error('iti_title.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="desc{{ $n }}" class="col-form-label">Description{{ $n }}</label>
                <div class="col-sm-12">
                    <textarea name="desc[]" id="desc{{ $n }}" class="form-control" rows="4">{{ $iti->desc }}</textarea>
                    @error('desc.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="b_point{{ $n }}" class="col-form-label">Bullet Point{{ $n }}</label>
                <div class="col-sm-12">
                    <textarea name="b_point[]" id="b_point{{ $n }}" class="form-control" rows="4">{{ $iti->b_point }}</textarea>
                    @error('b_point')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>
                @if($n > 1)
                <button type="button" class="btn btn-danger me-2 removesection">Remove</button>
                <script>
                    add_ckeditor('desc{{ $n }}');
                    add_ckeditor('b_point{{ $n }}');
                </script>
                @endif
            </div>
        </div>
        @php $n++; @endphp
        @endforeach
        @else
        <div class="iti-single">
            <div class="row mb-3">
                <label for="iti_title1" class="col-sm-2 col-form-label">Title1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="iti_title1" name="iti_title[]" value="{{ old('iti_title.0') }}">
                    @error('iti_title.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="desc1" class="col-form-label">Description1</label>
                <div class="col-sm-12">
                    <textarea name="desc[]" id="desc1" class="form-control" rows="4">{{ old('desc.0') }}</textarea>
                    @error('desc.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="b_point1" class="col-form-label">Bullet Point1</label>
                <div class="col-sm-12">
                    <textarea name="b_point[]" id="b_point1" class="form-control" rows="4">{{ old('b_point.0') }}</textarea>
                    @error('b_point')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>
            </div>
        </div>
        @endif
    </div>

    
    <script>
        var secno = <?=isset($n)?$n:2?>;
        add_ckeditor('desc1');
        add_ckeditor('b_point1');
        function add_section(){
            var sectionHtml = '<div class="iti-single mt-2">'+
                '<div class="row mb-3">'+
                    '<label for="iti_title'+secno+'" class="col-sm-2 col-form-label">Title'+secno+'</label>'+
                    '<div class="col-sm-10">'+
                        '<input type="text" class="form-control" id="iti_title'+secno+'" name="iti_title[]" value="">'+
                    '</div>'+
                '</div>'+
                '<div class="row mb-3">'+
                    '<label for="'+secno+'" class="col-form-label">Description'+secno+'</label>'+
                    '<div class="col-sm-12">'+
                        '<textarea name="desc[]" id="desc'+secno+'" class="form-control" rows="4"></textarea>'+
                    '</div>'+
                '</div>'+
                '<div class="row mb-3">'+
                    '<label for="b_point'+secno+'" class="col-form-label">Bullet Point'+secno+'</label>'+
                    '<div class="col-sm-12">'+
                        '<textarea name="b_point[]" id="b_point'+secno+'" class="form-control" rows="4"></textarea>'+
                    '</div>'+
                '</div>'+
                '<div class="d-flex justify-content-end">'+
                    '<button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>'+
                    '<button type="button" class="btn btn-danger me-2 removesection">Remove</button>'+
                '</div>'+
            '</div>';
            $(".iti-Sections").append(sectionHtml);
            add_ckeditor('desc'+secno);
            add_ckeditor('b_point'+secno);
            secno++;
        }
        $(".iti-Sections").on("click", ".removesection", function() {
            var isConfirmed = confirm("Are you sure?");
            if (isConfirmed) {
                $(this).closest(".iti-single").remove();
            }
        });
        
    </script>