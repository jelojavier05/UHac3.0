@extends('layouts.main')

@section('title')

@endsection

@section('navigation')
<!-- Dropdown Structure -->
<ul id="LoginDropdown" class="dropdown-content">
  <li><a href="#!"><img src="{!! URL::asset('../img/D.png') !!}" style="height: 50px;"></a></li>
  <li><a href="#!"><img src="{!! URL::asset('../img/E.png') !!}" style="height: 50px;"></a></li>
  <li><a href="#!"><img src="{!! URL::asset('../img/C.png') !!}" style="height: 50px;"></a></li>
  <li class="divider"></li>
</ul>
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a class='dropdown-button' href='#' data-activates='LoginDropdown' style="width: 200px;">Login</a></li>
      <li><a href="">Signup</a></li>
    </ul>
  </div>
</nav>
</div>

@endsection

@section('body')

<div class="container">
   <div class="fullscreen slider fixed">
    <ul class="slides">
      <li>
        <img src="{!! URL::asset('../img/background2.jpg') !!}"> 
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="{!! URL::asset('../img/background1.jpg') !!}">
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
    <div class="card">
      <div class="card-content">
        <ul id="LoginDropdown" class="dropdown-content">
          <li><a href="#!"><img src="{!! URL::asset('../img/D.png') !!}" style="height: 50px;"></a></li>
          <li><a href="#!"><img src="{!! URL::asset('../img/E.png') !!}" style="height: 50px;"></a></li>
          <li><a href="#!"><img src="{!! URL::asset('../img/C.png') !!}" style="height: 50px;"></a></li>
          <li class="divider"></li>
        </ul>
      </div>
    </div>
  </div> 
</div> 

  <script type="text/javascript">
  	$(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
  </script>


@endsection


@section('scripts')
	<script type="text/javascript">
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right' // Displays dropdown with edge aligned to the left of button
    }
  );
	</script>

@endsection