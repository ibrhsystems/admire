
    <input type="hidden" name="submit" value="tab4">
    
    <?php /* <div class="iti-Sections">
        @if(isset($solo) && $solo->faqs != '')
        @php $faqsArr = json_decode($solo->faqs); $n=1; @endphp
        @foreach($faqsArr as $k=>$faq)
        <div class="iti-single {{ ($n > 1)?'mt-2':'' }}">
            <div class="row mb-3">
                <label for="faq_title{{ $n }}" class="col-sm-2 col-form-label">Title{{ $n }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="faq_title{{ $n }}" name="faq_title[]" value="{{ $faq->title }}">
                    @error('iti_title.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="desc{{ $n }}" class="col-form-label">Description{{ $n }}</label>
                <div class="col-sm-12">
                    <textarea name="desc[]" id="desc{{ $n }}" class="form-control" rows="4">{{ $faq->desc }}</textarea>
                    @error('desc.0')<span class="text-danger">{{ $message }}</span>@enderror
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
                <label for="faq_title1" class="col-sm-2 col-form-label">Title1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="faq_title1" name="faq_title[]" value="{{ old('faq_title.0') }}">
                    @error('faq_title.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="desc1" class="col-form-label">Description1</label>
                <div class="col-sm-12">
                    <textarea name="desc[]" id="desc1" class="form-control" rows="4">{{ old('desc.0') }}</textarea>
                    @error('desc.0')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" onclick="add_section()">Add</button>
            </div>
        </div>
        @endif
    </div> */ ?>

    
    <script>
        var secno = <?=isset($n)?$n:2?>;
        
        function add_section(){
            var sectionHtml = '<div class="iti-single mt-2">'+
                '<div class="row mb-3">'+
                    '<label for="faq_title'+secno+'" class="col-sm-2 col-form-label">Title'+secno+'</label>'+
                    '<div class="col-sm-10">'+
                        '<input type="text" class="form-control" id="faq_title'+secno+'" name="faq_title[]" value="">'+
                    '</div>'+
                '</div>'+
                '<div class="row mb-3">'+
                    '<label for="'+secno+'" class="col-form-label">Description'+secno+'</label>'+
                    '<div class="col-sm-12">'+
                        '<textarea name="desc[]" id="desc'+secno+'" class="form-control" rows="4"></textarea>'+
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