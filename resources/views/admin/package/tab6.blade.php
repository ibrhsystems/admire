
    <input type="hidden" name="submit" value="tab6">
    <div class="row mb-3">
        <legend class="col-form-label col-sm-4 pt-0">Is Show on Front?</legend>
        <div class="col-md-8 d-flex">
            <div class="mx-2">
                <input type="radio" class="btn-check" name="is_front" id="danger-outlined" value="N" autocomplete="off" checked>
                <label class="btn btn-outline-danger" for="danger-outlined">No</label>
            </div>
            <div class="mx-2">
                <input type="radio" class="btn-check" name="is_front" id="success-outlined" value="Y" autocomplete="off" {{ ((isset($solo) && $solo->is_front == 'Y') || old('is_front') == 'Y')?'checked':'' }}>
                <label class="btn btn-outline-success" for="success-outlined">Yes</label>
            </div>
            
            @error('is_front')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <legend class="col-form-label col-sm-4 pt-0">Is Featured?</legend>
        <div class="col-md-8 d-flex">
            <div class="mx-2">
                <input type="radio" class="btn-check" name="is_featured" id="is_featuredno" value="N" autocomplete="off" checked>
                <label class="btn btn-outline-danger" for="is_featuredno">No</label>
            </div>
            <div class="mx-2">
                <input type="radio" class="btn-check" name="is_featured" id="is_featuredyes" value="Y" autocomplete="off" {{ ((isset($solo) && $solo->is_featured == 'Y') || old('is_featured') == 'Y')?'checked':'' }}>
                <label class="btn btn-outline-success" for="is_featuredyes">Yes</label>
            </div>
            
            @error('is_featured')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-4 pt-0">Status</legend>
        <div class="col-sm-8">
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
    
    