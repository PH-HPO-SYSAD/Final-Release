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
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover ">
              <thead>
                <tr class>
                  <th>Inventory Tag</th>
                  <th>Model</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Physical Status</th>
                </tr>
              </thead>
              <tbody>
                    <tr class="info">
                        <td>{{ $asset->tag_number }}</td> 
                        <td>{{ $asset->model }}</td> 
                        <td>{{ $asset->brand->name }}</td> 
                        <td>{{ $asset->category->name }}</td>  
                        <td>{{ $asset->status }}</td> 
                    </tr>
              </tbody>
            </table> 
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Color</th>
                  <th>Asset History</th>
                  <th>warranty</th>
                  <th>warranty end</th>
                </tr>
              </thead>
              <tbody>
                    <tr class="warning">
                        <td>{{ $asset->description }}</td> 
                        <td>{{ $asset->color }}</td> 
                        <td>{{ $asset->asset_history }}</td> 
                        <td>{{ $asset->warranty }}</td>  
                        <td>{{ $asset->warranty_end }}</td> 
                    </tr>
              </tbody>
            </table> 
        </div>
        <div class="col-md-4">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>Location History</th>
                </tr>
              </thead>
              <tbody>
                    <tr class="warning">
                        <td>{{ $asset->location }}</td> 
                    </tr>
              </tbody>
            </table> 
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