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
              			<div class="card-title">
                            <img src="{!! URL::asset('../img/officer.png') !!}" style="height: 100px ; width: 100px ;">
                            
                        </div>
	              			<div class="row black-text">
							    <form class="col s12 black-text">
							      	    <div class="row">
                                            <div class="input-field col s12">
                                            <input placeholder="N01-04-01***" id="licenseNumber" type="text" class="validate">
                                            <label for="license">License Number</label>
                                            </div>
                                            <input type="button" class="btn" value="Find" id = 'btnFind'/>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="row">
                                            
                                                <label id = 'strName'></label>
                                            </div>
                                            <div class="row">
                                                <label id = 'strDriverLicense'></label>
                                            
                                                <label id = 'strRestriction'></label>
                                            
                                                <label id = 'dateExpiration'></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select multiple id = 'violations'>
                                                    @foreach($rules as $value)
                                                    <option value="{{$value->intRulesId}}">{{$value->strRuleDesc}}</option>
                                                    @endforeach
                                                </select>
                                                <label>Violations</label>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#btnFind').click(function(){
        
        var licenseNumber = $('#licenseNumber').val();
        $.ajax({
            type: "GET",
            url: "/driver?strLicenseNumber=" + licenseNumber,
            success: function(data){
                if (data){
                    $('#strName').text(data.strDrivFname + ' ' + data.strDrivLname);
                    $('#strLicenseNumber').text(data.strDrivLicense);
                    var strRestriction = '';
                    $.each(data.restriction,function(index,value){
                        strRestriction += value.intDRRestId;
                    });
                    $('#strRestriction').text(strRestriction);
                    $('#dateExpiration').text(data.strDate);
                }else{
                    confirm('No Existing record.');
                }                    
                    
            },
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');

            }
        });//ajax
    });

    $('#btnSubmit').click(function(){
        var arrViolation = $('#violations').val();
        $.ajax({
            type: "POST",
            url: "{{action('DriverController@store')}}",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                licenseNumber: licenseNumber,
                arrViolation: arrViolation
            },
            success: function(data){
                confirm('success');
            },
            error: function(data){
                var toastContent = $('<span>Error Occured. </span>');
                Materialize.toast(toastContent, 1500,'red', 'edit');

            }
        });//ajax
    });
});
</script>
	
</body>
</html>