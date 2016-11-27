@extends('layouts.main')

@section('title')

@endsection

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/materialize.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/styles.css') !!}">
	<script type="text/javascript" src="{!! URL::asset('../js/jquery-2.1.1.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/init.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.js') !!}"></script>
    

@section('navigation')
<!-- Dropdown Structure -->
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper black">
      <a href="#!" class="brand-logo center ">HOLEH</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="mobile.html">Sign Up</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        
        <li><a href="#!"><img src="{!! URL::asset('../img/C.png') !!}" class="responsive-img"></a></li>
        <li><a href="#!"><img src="{!! URL::asset('../img/E.png') !!}" class="responsive-img"></a></li>
        <li><a href="#!"><img src="{!! URL::asset('../img/D.png') !!}" class="responsive-img"></a></li>
        <li><a href="signup.blade.php">Sign Up</a></li>
      </ul>
    </div>
  </nav>
</div>

@endsection

@section('body')

  <div class="fullscreen slider">
    <ul class="slides">
      <li>
        <img src="{!! URL::asset('../img/background3.jpg') !!}"> 
        <div class="caption Left-align">
          <h3>Holeh!</h3>
          <h5 class="light grey-text text-lighten-3">pero sauve lang...</h5>
        </div>
      </li>
      <li>
        <img src="{!! URL::asset('../img/background1.jpg') !!}">
      </li>
    </ul>
  </div>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <div class="row" style="position:absolute;z-index:100000">
        <div class="container">
            <div class="col m6 hide-on-small-only">
                <div class="row">
                    <a href="#!"><img src="{!! URL::asset('../img/C.png') !!}" class="responsive-img"></a>
                </div>
                <div class="row">
                    <div class = "col m6">
                        <a href="#!"><img src="{!! URL::asset('../img/E.png') !!}" class="responsive-img"></a>
                    </div>
                    <div class= "col m6">
                        <a href="#!"><img src="{!! URL::asset('../img/D.png') !!}" class="responsive-img"></a>
                    </div>
                </div>
        </div>
    </div>
        
    <div id="modal1" class="modal" style="z-index:1000000;">
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