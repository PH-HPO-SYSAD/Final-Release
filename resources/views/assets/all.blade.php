@extends('layout.master')

@section('stylesheet')
{{-- <link rel="stylesheet" type="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" href=""> --}}
<link rel="stylesheet" type="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" href="">
<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.foundation.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.jqueryui.min.css') }}">
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
	<div class="col-md-12">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">List of assets</h3>
		</div>
		<div class="panel-body">
			<table class="table" id="assetTable">
			    <thead>
			        <tr>
			            <th>Tag Number</th>
			            <th>Description</th>
			            <th>Category</th>
			            <th>Brand</th>
			            <th>Model</th>
			            <th>Status</th>
			            <th>Action</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($assets as $asset)
			        <tr>
    						<td>{{ $asset->tag_number }}</td> 
    						<td>{{ $asset->description }}</td> 
    						<td>{{ $asset->category->name }}</td> 
    						<td>{{ $asset->brand->name or 'No brand' }}</td> 
    						<td>{{ $asset->model }}</td> 
    						<td>{{ $asset->status }}</td> 
    						<td>
    							<a href="/asset/{{ $asset->asset_id }}">
    								<button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-search"></i> View</button>
    							</a>
    							<a href="#" data-toggle="modal" data-target="#edit">
    								<button class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i> edit</button>
    							</a>
    			      </td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
</div>

{{-- Modal --}}
<div class="modal fade" id="learn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">View Contents</h4>
            </div>
            <div class="modal-body">
                <p>This is where you can search for a specific asset and edit if things went wrong. Only admin users are allowed to edit and update assets thank you.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit">
    <div class="modal-dialog">
         <form class="form-horizontal">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Asset Form</h4>
              </div>
              <div class="modal-body">
                <fieldset>
                  <legend>Edit Information below</legend>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Category</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="category">
                      	@foreach(App\Category::all() as $category)
                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="select" class="col-lg-2 control-label">Status</label>
                      <div class="col-lg-10">
                        <select class="form-control" id="status" name="status">
                          <option value="Working">Working</option>
                          <option value="Defective">Defective</option>
                        </select>
                      </div>
                    </div>
                  <div class="form-group" id="AddInfo" hidden>
                    <label for="textArea" class="col-lg-2 control-label">Additional Information</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="textArea"></textarea>
                      <span class="help-block">Please Include Department information if needed</span>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#assetTable').DataTable();

    $("#status").on('change', function(){
      if($('#status').val() == "Defective") {
        $("#AddInfo").show();
      } else{
        $("#AddInfo").hide();
      }
    });
});
</script>
@stop