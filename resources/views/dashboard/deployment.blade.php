@extends('layout.master')
@section('stylesheet')
{{-- <link rel="stylesheet" type="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" href=""> --}}
<link rel="stylesheet" type="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" href="">
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
    		<div class="col-md-11">
		    <div class="panel panel-info">
		        <div class="panel-heading">
		            <h3 class="panel-title">Vacant Assets</h3>
		        </div>
		        <div class="panel-body">
		            <table class="table" id="assetTable2">
		                <thead>
		                    <tr>
		                        <th>Tag Number</th>
		                        <th>Description</th>
		                        <th>Category</th>
		                        <th>Brand</th>
		                        <th>Model</th>
		                        <th>Location</th>
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
		                        <td>{{ $asset->brand->name }}</td> 
		                        <td>{{ $asset->model }}</td> 
		                        <td>{{ $asset->location }}</td>
		                        <td>{{ $asset->status }}</td> 
		                        <td>
		                            <a href="/asset/{{ $asset->asset_id }}">
		                                <button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-search"></i> View</button>
		                            </a>
		                              @if(auth()->user()->isAdmin())
											<a href="#"  data-toggle="modal" data-target="#update">
												<button class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Deploy</button>
							       			</a>
					       			  @endif
		                        </td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
	</div>
    	</div>
    </div>

    <div class="modal fade" id="learn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Deployment Contents</h4>
            </div>
            <div class="modal-body">
                <p>This is where you can deploy a vacant asset. Please be careful in filling those forms to avoid conflicts thank you. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
 <div class="modal fade" id="update">
    <div class="modal-dialog">
    <form class="form-horizontal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Deployment Form</h4>
            </div>
            <div class="modal-body">
  <fieldset>
    <legend>Fill the required information below</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Assinged Employee</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Assinged Person">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Cubicle Number</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Assinged Person">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Additional Information</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">Please Include Department information if needed</span>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Select Floor</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1st Floor</option>
          <option>2nd Floor</option>
          <option>3rd Floor</option>
          <option>4th Floor</option>
        </select>
        <br>
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
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/daTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#assetTable').DataTable();
    $('#assetTable1').DataTable();
    $('#assetTable2').DataTable();
});
</script>
@stop