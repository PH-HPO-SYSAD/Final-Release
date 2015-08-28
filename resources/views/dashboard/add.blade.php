@extends('layout.master')
@section('stylesheet')
<link rel="stylesheet" type="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" href="">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.foundation.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.jqueryui.min.css') }}">
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>  
<link rel="stylesheet" type="text/css" href= "{{ asset('css/style.css') }}">
@stop  
@section('contents')
<div class="dash-jumbo">
    <div class="jumbotron" align="center">
        <h2>Welcome {{ auth()->user()->name }} to HPO Asset Inventory</h2>
        <p>To help yourself click learn more to know more.</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#learn">Learn More</a>
    </div>
</div>



     <div class="row">
          <div class="col-lg-10">
            <div class="well bs-component">
              <form class="form-horizontal" action="{{ action('AssetController@store') }}" method="POST">
                <fieldset>
                  <legend>Asset Information</legend>
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Brand</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="brand">
                      	@foreach(App\Brand::all() as $brand)
                        <option value="{{ $brand->brand_id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="assetModel" class="col-lg-2 control-label" >Model</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputModel" name="model" placeholder="Model Name">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Category</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="category">
                      	@foreach(App\Category::all() as $category)
                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="textArea" name="description"></textarea>
                      <span class="help-block">Please add some additional information or specifications of the asset.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="assetModel" class="col-lg-2 control-label" >Control Number</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputContno" name="control_number" placeholder="Control Number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="assetModel" class="col-lg-2 control-label" >Serial Number</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputSerial" name="serial_number" placeholder="Serial Number">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="assetModel" class="col-lg-2 control-label" >Color</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputSerial" name="color" placeholder="Color">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Asset History</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="asset_history">
                        <option value="Brand New" >Brand New</option>
                        <option value="Second Use" >Second Use</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Physical Status</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="status">
                        <option value="Working">Working</option>
                        <option value="Defective">Defective</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Deployment Status</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select" name="location">
                        <option value="vacant">Vacant</option>
                        <option value="None">For Deployment</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Warranty Status</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="warranty" name="warranty">
                        <option value="Under Warranty">Under Warranty</option>
                        <option value="No Warranty">No Warranty</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group" id="warrantyEnd">
                    <label for="select" class="col-lg-2 control-label">Warranty End</label>
                    <div class="col-lg-10">
                      <div class='input-group date' id='datetimepicker3'>
                        <input type='text' class="form-control" name="warranty_end" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
  </div>


  <div class="modal fade" id="learn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Dashboard Contents</h4>
            </div>
            <div class="modal-body">
                <p>This is the contents of additional information about Dashboard</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="{{ asset('js/daTables.responsive.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker3').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $("#warranty").on('change', function(){
      if($('#warranty').val() == "Under Warranty") {
        $("#warrantyEnd").show();
      } else{
        $("#warrantyEnd").hide();
      }
    });
});
</script>
@stop