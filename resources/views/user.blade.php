@extends('layouts.main')

@section('title')

@endsection

@section('navigation')

	<div class="navbar-fixed">
	  	<nav>
	    	<div class="nav-wrapper">
	      		<a href="#" class="brand-logo center">Logo</a>
			      	<ul id="nav-mobile" class="left hide-on-med-and-down">
			        	<li><a id = 'btnLogin'>Rafael</a></li>
			        	<li><a href="">Sign Up</a></li>
			    	</ul>
	    	</div>
	  	</nav>
	</div>
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

  <script type="text/javascript">
  	  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
     
  </script>

@endsection

@section('body')

<!--
  <div class="fullscreen slider">
    <ul class="slides">
      <li>
        <img src="{!! URL::asset('../img/background2.jpg') !!}"> <!-- random image 
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="{!! URL::asset('../img/background1.jpg') !!}"> <!-- random image 
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
-->
  <script type="text/javascript">
  	$(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
  </script>


@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$('btnLogin').click(function(){
			$('#modalRounds').openModal();
		});
	});
</script>


@endsection