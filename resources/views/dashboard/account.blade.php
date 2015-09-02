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

{{-- account information --}}
    <div class="row">
    	<div class="col-md-4">
			<div class="list-group">
			  <p class="list-group-item active">
			  	Account Information
			  </p>
			  <p  class="list-group-item">Name:&nbsp&nbsp{{ auth()->user()->name }}
			  </p>
			  <p  class="list-group-item">Username:&nbsp&nbsp{{ auth()->user()->username }} <a href="#"  data-toggle="modal" data-target="#edit" class="btn btn-sm btn-primary">edit</a>
			  </p>
			   <p class="list-group-item">Account Type:&nbsp&nbsp{{ auth()->user()->account_type }}
			  </p>
			</div>
    	</div>
    </div>

{{-- modal fade (Edit Username) --}}
<div class="modal fade" id="edit">
    <div class="modal-dialog">
         <form class="form-horizontal">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Username</h4>
              </div>
              <div class="modal-body">
                <fieldset>
                  <legend>Edit Information below</legend>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">New Username</label>
                    <div class="col-lg-10">
                    	<input type="text" class="form-control" id="username" name="edit_username" placeholder="New Username">
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