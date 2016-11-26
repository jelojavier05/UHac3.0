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
        	<div class="col s12 m8 push-m6">
          		<div class="card" style="opacity: -10px;">
                    <div class="card-title">
                            <div class="valign-wrapper center-align">
                                <div class="col s3">
                                    <img src="{!! URL::asset('../img/officer.png') !!}" class="responsive-img"/>
                                </div>
                                <div class="col s9">
                                    <h4 class="black-text">VIOLATION SUMMARY</h4>
                                </div>
                            </div>
                        </div>
            		<div class="card-content white-text" style="border-radius: 100px;">
              			
	              			<div class="row black-text">
							    <form class="col s12 black-text">
							      	  <div class="row">
                                        <label class="col s6 m2 push-m4">Date:</label>
                                        <label id="Date" class="col s6 m2 push-m4">2016-11-26</label>
                                                
                                        <label class="col s6 m2">Enforcer Name:</label>
                                        <label id="EnforcerName" class="col s6 m2">Dalisay, Kardo</label>
                                                
                                        <label class="col s2 m2">Address:</label>
                                            
                                        <label id="DriverRestriction" class="col s10 m10">BLAH BLAH BLAH BLAH</label>
                                            
                                      </div>
                                        
                                      <div class="row">
                                          <h6 class="black-text">Driver's Information</h5>
                                            <div class="row">
                                                <label class="col s6 m3">License Number:</label>
                                                <label id="DriverLicenseNo" class="col s6 m3">{{$summary->driverData->strDrivLicense}}</label>
                                            
                                                <label class="col s6 m3">Driver Name:</label>
                                                <label id="DriverName" class="col s6 m3">{{$summary->driverData->strDrivFname}} {{$summary->driverData->strDrivLname}}</label>
                                            
                                                <label class="col s6">License Type:</label>
                                                <label id="DriverLicenseType" class="col s6">{{$summary->driverData->strLicenseType}}</label>
                                                
                                                <label class="col s6">Driver License Expiration:</label>
                                                <label id="DriverLicenseExpiration" class="col s6">{{$summary->driverData->strDate}}</label>
                                            </div>
                                        
                                            <div class="row">
                                                <table class="striped">
                                                    <thead>
                                                      <tr>
                                                          <th data-field="id">Violation</th>
                                                          <th data-field="name">Fine</th>
                                                      </tr>
                                                    </thead>

                                                    <tbody>
                                                      @foreach($summary->arrViolation as $value)
                                                      <tr>
                                                        <td>{{$value->strRuleDesc}}</td>
                                                        <td>{{$value->dblRuleFine}}</td>
                                                      </tr>
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                            </div>
                                        </div>
							         </form>
						    </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">cancel</i>back</a>
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
      $('#btnSubmit').click(function(){
        $.ajax({
          type: "POST",
          url: "{{action('TicketController@store')}}",
          beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
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