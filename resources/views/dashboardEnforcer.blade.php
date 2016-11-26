@extends('layouts.userDashboard')

@section('title')

@endsection

	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8 ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title></title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/materialize.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/styles.css') !!}">
	<script type="text/javascript" src="{!! URL::asset('../js/jquery-2.1.1.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/init.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.js') !!}"></script>

<body>

@section('dashBoard')

      <div class="row">
        <div class="col s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="{!! URL::asset('../img/signupbg.png') !!}">
                  <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">

                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
      


      </div>

@endsection
