@extends('layout.master')

@section('stylesheet')
<style type="text/css">
body {
    background-color: #444;
    background: url(http://s18.postimg.org/l7yq0ir3t/pick8_1.jpg);
}
</style>
@stop

@section('contents')
<br><br>
<div class="jumbotron" align="center">
	<h1>OOPS! Error 404</h1>
	<p>Page was not found.</p>
</div>
@stop

@section('script')
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(document).mousemove(function(event) {
	    TweenLite.to($("body"), 
	    .5, {
	        css: {
	            backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
	        	"background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
	        }
	    });
	});
});
</script>
@stop