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

{{-- Welcome Screen modal --}}

<div class="dash-jumbo">
    <div class="jumbotron" align="center">
        <h2>Welcome {{ auth()->user()->name }} to HPO Asset Inventory</h2>
        <p>To help yourself click "learn more" to know more.</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#learn">Learn More</a>
    </div>
</div>

{{-- auditing --}}

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Auditing</h3>
			</div>
			<div class="panel-body">
				<table class="table" id="assetTable">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Cubicle</th>
                        <th>Assets</th>
                        <th>Assigned Person</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $asset)
                    <tr>
                        <td>{{ $asset->location }}</td> 
                        <td>{{ $asset->location }}</td> 
                        <td>{{ $asset->location }}</td> 
                        <td>{{ $asset->location }}</td> 
                        <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="checkbox"> Mismatch &nbsp
                          </label>
                        </div>
                        <a href="/asset/{{ $asset->asset_id }}">
                            <button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-search"></i> View</button>
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

{{-- modal id learn --}}

<div class="modal fade" id="learn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Auditing Information</h4>
            </div>
            <div class="modal-body">
                <p>This is where you can check all the assets assigned in each cubicle in every floor. If one of the asset tags is mismatched, please leave the checkbox unchecked to determine that the asset tag is not on the assigned area thank you. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#assetTable').DataTable();
    $('#assetTable1').DataTable();
    $('#assetTable2').DataTable();
});
</script>
@stop