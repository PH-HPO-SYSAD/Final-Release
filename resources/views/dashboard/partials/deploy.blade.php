<form class="form-horizontal" action="/asset/{{ $asset->asset_id}}/deploy" method="POST">
    {!! csrf_field() !!}
    <fieldset>
      <legend>{{ $asset->tag_number }}</legend>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Assinged Employee</label>
        <div class="col-lg-10">
          <select class="form-control chosen-select" name="employee_id">
            @foreach(App\Employee::all() as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
          </select>
        </div>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Cubicle Number</label>
        <div class="col-lg-10">
          <select class="form-control" name="parent_id">
            <option value="null">No parent</option>
            @foreach(App\Asset::deployedAsset()->get() as $parent)
              @unless($parent->deployments->isEmpty())
              <option value="{{ $parent->asset_id }}">{{ $parent->tag_number }}</option>
              @endunless
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Location</label>
        <div class="col-lg-10">
          <select class="form-control" name="location_id">
            @foreach(App\Location::all() as $location)
              <option value="{{ $location->location_id }}">{{ $location->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Additional Information</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="3" id="textArea"></textarea>
          <span class="help-block">Please Include Department information if needed</span>
        </div>
      </div>
      </div>
    </fieldset>
    <hr> 
    <button class="btn btn-primary" type="submit">Deploy asset</button>
</form>