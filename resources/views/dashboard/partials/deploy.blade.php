<form class="form-horizontal" action="/asset/{{ $asset->asset_id}}/deploy" method="POST">
    {!! csrf_field() !!}
    <fieldset>
      <legend>{{ $asset->tag_number }}</legend>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Assinged Employee</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="inputEmail" placeholder="Assinged Person" name="employee_name">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Cubicle Number</label>
        <div class="col-lg-10">
          <select class="form-control" name="assigned_asset_id">
            @foreach(App\Asset::where('category_id', 18)->get() as $cubicle)
              <option value="{{ $cubicle->asset_id }}">{{ $cubicle->tag_number }}</option>
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