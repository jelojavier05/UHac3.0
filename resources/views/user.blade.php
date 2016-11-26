@extends('layouts.main')

@section('title')

@endsection

@section('navigation')

	<div class="navbar-fixed">
	  	<nav>
	    	<div class="nav-wrapper">
	      		<a href="#" class="brand-logo center">Logo</a>
			      	<ul id="nav-mobile" class="left hide-on-med-and-down">
			        	<li><a href="sass.html">Login</a></li>
			        	<li><a href="">Sign Up</a></li>
			    	</ul>
	    	</div>
	  	</nav>
	</div>

@endsection

@section('body')

  <div class="fullscreen slider">
    <ul class="slides">
      <li>
        <img src="{!! URL::asset('../img/background2.jpg') !!}"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="{!! URL::asset('../img/background1.jpg') !!}"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>

  <script type="text/javascript">
  	  $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
  </script>

@endsection