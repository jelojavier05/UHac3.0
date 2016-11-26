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
  		<img src="{!! URL::asset('../img/traffic_light.jpg') !!}" style='width:100%;height:110%;background-size:cover' alt='[]' />
	</div>

	<div class="container caption center">
      	<div class="row">
      		<br>
        	<div class="col s12 m6 push-m6">
          		<div class="card" style="opacity: -10px;">
                    
            		<div class="card-content white-text" style="border-radius: 100px;">
              			<div class="card-title">
                            <div class="valign-wrapper black-text center">
                                <div class="col s4 m3">
                                    <img src="{!! URL::asset('../img/officer.png') !!}" class="responsive-img"/>
                                </div>
                                <div class="col s8 m9">
                                    <h4>VIOLATION TICKET</h4>
                                </div>
                            </div>
                        </div>
	                    <div class="row black-text">
				            <form class="col s12 black-text">
							      	    <div class="valign-wrapper">
                                            <div class="input-field col s12">
                                            <input placeholder="N01-04-01***" id="licenseNumber" type="text" class="validate">
                                            <label for="license">License Number</label>
                                            </div>
                                            <a class="btn pink" id = 'btnFind'><i class="material-icons">search</i></a>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="row">
                                                <h6 class="black-text">Driver's Information</h6>
                                                <div class="row">
                                                    <label class = "col s4">Name: </label>
                                                    <label id = 'strName' class="col s8"></label>
                                                </div>
                                                <div class="row">
                                            
                                                    <label class="col s4">License No.: </label>

                                                    <label id = 'strLicenseNumber' class="col s8"></label>
                                                </div>
                                                <div class="row">
                                                    
                                                    <label class="col s4">License Type: </label>

                                                    <label id = 'strLicenseType' class="col s8"></label>
                                                </div>
                                                <div class="row">
                                                    <label class="col s4">Restrictions: </label>

                                                    <label id = 'strRestriction' class="col s8"></label>
                                                </div>
                                                <div class="row">
                                                
                                                    <label class="col s4">Expiration Date: </label>
                                            
                                                    <label id = 'dateExpiration' class="col s8"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select multiple id = 'violations'>
                                                    @foreach($rules as $value)
                                                    <option value = '{{$value->intRulesId}}'>{{$value->strRuleDesc}}</option>
                                                    @endforeach
                                                </select>
                                                <label>Violations</label>
                                            </div>
                                        </div>
							    </form>
				        </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn pink lighten-1"><i class="material-icons left">cancel</i>back</a>
						<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'><i class="material-icons left">done</i>submit</a>
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
                    $('#strLicenseType').text(data.strLicenseType);
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
        var licenseNumber = $('#licenseNumber').val();
        console.log(arrViolation);

        $.ajax({
            type: "POST",
            url: "{{action('TicketController@create')}}",
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