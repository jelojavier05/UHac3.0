<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8 ">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<title></title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/materialize.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! URL::asset('../css/styles.css') !!}">
	<script type="text/javascript" src="{!! URL::asset('../js/jquery-2.1.1.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/init.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.min.js') !!}"></script>
	<script type="text/javascript" src="{!! URL::asset('../js/materialize.js') !!}"></script>

</head>

<body id="signupBody">

	<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>
  		<img src="{!! URL::asset('../img/background1.jpg') !!}" style='width:100%;height:100%' alt='[]' />
	</div>

	<div class="container caption center align">
      	<div class="row">
      		<br>
        	<div class="col s12 m8 push-m6">
          		<div class="card" style="opacity: -10px;">
            		<div class="card-content white-text" style="border-radius: 100px;">
              			<span class="card-title"><img src="{!! URL::asset('../img/car.png') !!}" style="height: 100px ; width: 100px ;"></span>
	              			<div class="row black-text">
							    <form class="col s12 black-text">
							      	<div class="row">
							        	
										<div class="input-field col s4">
							          		<input placeholder="UhacDelaCruz" id="userName" type="text" class="validate">
							          		<label for="user_name">Username</label>
							        	</div>
										<div class="input-field col s4">
							          		<input placeholder="*******" id="password" type="password" class="validate">
							          		<label for="password">Password</label>
							        	</div>
							      	</div>
							    </form>
						    </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'><i class="material-icons right">done</i>Login</a>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>
</body>
</html>