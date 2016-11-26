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

<body id="ticketingBody">

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
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input placeholder="N01-04-01***" id="licenseNumber" type="text" class="validate">
                                                <label for="license">License Number</label>
                                                <input type="button" class="btn" value="Find" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label name="DriverLicenseNo">N01-04-01***</label>
                                                <label name="DriverName">Dela Cruz Juan</label>
                                                <label name="DriverLicenseType">License Type</label>
                                                <label name="DriverRestriction">Restriction</label>
                                                <label name="DriverLicenseExpiration"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select multiple id = 'violations'>
                                                    <option value="1">Violation 1</option>
                                                    <option value="2">Violation 2</option>
                                                    <option value="3">Violation 3</option>
                                                    <option value="4">Violation 4</option>
                                                    <option value="5">Violation 5</option>
                                                    <option value="6">Violation 6</option>
                                                    <option value="7">Violation 7</option>
                                                    <option value="8">Violation 8</option>
                                                </select>
                                                    <label>Violations</label>
                                            </div>
                                        </div>
							      	</div>
							    </form>
						    </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">cancel</i>cancel</a>
						<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'><i class="material-icons right">done</i>submit</a>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function() {
      $('select').material_select();
      $('.slider').slider({full_width: true});
    });    
	</script>

	
</body>
</html>