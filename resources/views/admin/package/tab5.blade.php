
    <input type="hidden" name="submit" value="tab5">
        
    <div class="row mb-3">
        <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="mrp" name="mrp" value="{{ old('mrp',(isset($solo))?$solo->mrp:'') }}">
        @error('mrp')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="sp" class="col-sm-2 col-form-label">SP</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="sp" name="sp" value="{{ old('sp',(isset($solo))?$solo->sp:'') }}">
        @error('sp')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="day" class="col-sm-2 col-form-label">Day</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="day" name="day" value="{{ old('day',(isset($solo))?$solo->day:'') }}">
        @error('day')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="night" class="col-sm-2 col-form-label">Night</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="night" name="night" value="{{ old('night',(isset($solo))?$solo->night:'') }}">
        @error('night')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="max_people" class="col-sm-2 col-form-label">Max People</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="max_people" name="max_people" value="{{ old('max_people',(isset($solo))?$solo->max_people:'') }}">
        @error('max_people')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    