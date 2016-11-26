<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8 ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>Profile</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/materialize.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/styles.css') !!}">
	<script type="text/javascript" src="{!! URL::asset('../js/jquery-2.1.1.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/init.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.js') !!}"></script>

</head>

<body>

	<div class="container">
      	<div class="row">
        <div class="col s12 m6 push-m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="userName" type="text" class="validate">
			          <label for="userName">Last Name</label>
			        </div>
			        <div class="input-field col s12">
			          <input id="password" type="password" class="validate">
			          <label for="password">Password</label>
			        </div>
			      </div>
            </div>
            <div class="card-action center">
	            <a class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">cancel</i>cancel</a>
				<a class="waves-effect waves-light btn green lighten-1"><i class="material-icons right">done</i>submit</a>
            </div>
          </div>
        </div>
      	</div>
	</div>

</body>
</html>