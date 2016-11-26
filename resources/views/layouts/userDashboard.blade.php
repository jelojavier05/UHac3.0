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


  <nav class="black" style="height: 70px;">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-teal btn-flat white">Logout</a></li>
      </ul>
    </div>
  </nav>

<div>
	@yield('dashBoard')
</div>

	@yield('scripts')

</body>
</html>