@extends('layout.master')
{{-- Navigation --}}
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">HPO Asset Inventory</a>
    </div>
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="{{ action('DashController@dashboard') }}">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Asset <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class=""><a href="{{ action('DashController@AddAsset') }}">Add Asset</a></li>
            <li><a href="{{ action('DashController@SearchAsset') }}">Search and Update</a></li>
          </ul>
        </li>
        <li class="Logout">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Account Settings</a></li>
            <li><a href="{{ action('DashController@index') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
{{-- end navigation --}}
@section('contents')
  <div class="dash-jumbo">
    <div class="jumbotron" align="center">
      <h2>Search and update assets</h2>
      <p>To help yourself click learn more to know more.</p>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#learn">Learn More</a>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" value="" class="form-control" placeholder="Search using Fuzzy searching">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>First column</th>
                        <th>Second column</th>
                        <th>Third column</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Introducing</td>
                        <td>jQuery</td>
                        <td>Searchable</td>
                        <td><a href="#" class="btn btn-primary">update</a></td>
                    </tr>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                        <td>Dolor</td>
                        <td><a href="#" class="btn btn-primary">update</a></td>
                    </tr>
                    <tr>
                        <td>Some</td>
                        <td>More</td>
                        <td>Data</td>
                        <td><a href="#" class="btn btn-primary">update</a></td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </div>



  </script>


  

  <div class="modal fade" id="learn">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Search Results</h4>
      </div>
      <div class="modal-body">
        <p>This is the contents of additional information about Searching Assets</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- Query Asset here -->

@endsection
@section('script')
  <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
  <script type="text/javascript">

        $(function () {
      $( '#table' ).searchable({
          striped: true,
          oddRow: { 'background-color': '#f5f5f5' },
          evenRow: { 'background-color': '#fff' },
          searchType: 'fuzzy'
      });
      
      $( '#searchable-container' ).searchable({
          searchField: '#container-search',
          selector: '.row',
          childSelector: '.col-xs-4',
          show: function( elem ) {
              elem.slideDown(100);
          },
          hide: function( elem ) {
              elem.slideUp( 100 );
          }
      })
  });
  </script>
@endsection()