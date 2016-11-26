<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8 ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/materialize.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/styles.css') !!}">

	<script type="text/javascript" src="{!! URL::asset('../js/jquery-2.1.1.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/init.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.js') !!}"></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<script src="{!! URL::asset('../js/datatable.js') !!}"></script>
  	<script src="{!! URL::asset('../js/jquery.dataTables.min.js') !!}"></script>
</head>
<body>


<<<<<<< HEAD
  <nav class="black" style="height: 70px;">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo center"><img src="{!! URL::asset('../img/final.png') !!}"" style="height: 70px; width: 200px;"></a>
=======
  <nav>
    <div class="nav-wrapper black">
      <a href="#!" class="brand-logo center ">HOLEH</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
>>>>>>> e5594347b0dc4988c381219a10ec21a2c3d02088
      <ul class="right hide-on-med-and-down">
        <li><a id = 'logout'>Logout</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        
        <li><a href="#!"><img src="{!! URL::asset('../img/C.png') !!}" class="responsive-img"></a></li>
        <li><a href="#!"><img src="{!! URL::asset('../img/E.png') !!}" class="responsive-img"></a></li>
        <li><a href="#!"><img src="{!! URL::asset('../img/D.png') !!}" class="responsive-img"></a></li>
        <li><a href="mobile.html">Sign Up</a></li>
      </ul>
    </div>
  </nav>

<div>
	@yield('dashBoard')
</div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#logout').click(function(){
        $.ajax({
          type: "GET",
          url: "{{action('LoginController@logout')}}",
          success: function(data){
            window.location.href = '{{ URL::to("/") }}';
          },
          error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
      });
    });
  </script>
	@yield('scripts')

</body>
</html>