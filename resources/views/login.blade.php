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
  		<img src="{!! URL::asset('../img/background1.jpg') !!}" style='width:100%;height:auto' alt='[]' />
	</div>

	<div class="container caption center align">
      	<div class="row">
      		<br>
        	<div class="col s12 m6 l6 center align push-m3 push-l3">
          		<div class="card" style="opacity: -10px;">
            		<div class="card-content white-text" style="border-radius: 100px;">
              			<span class="card-title"><img src="{!! URL::asset('../img/Hooleh.png') !!}" style="height: 100px ; width: auto ;"></span>
                            <h4 class="black-text">Sign in to Hooleh</h4>
                            <div class="row">
                                
                                  <input name="group1" type="radio" id="company" class = 'with-gap' value  =3 />
                                  <label for="company">Company</label>
                                  <input name="group1" type="radio" id="enforcer" class = 'with-gap' value = 2 />
                                  <label for="enforcer">Enforcer</label>
                                  <input class="with-gap" name="group1" type="radio" id="driver" value = 1 />
                                  <label for="driver">Driver</label>
                            </div>
	              			<div class="row black-text">
                                <div class="container">
                                    <form class="col s12 black-text">
                                        <div class="row">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input placeholder="UhacDelaCruz" id="userName" type="text" class="validate">
                                                    <label for="user_name">Username</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input placeholder="*******" id="password" type="password" class="validate">
                                                    <label for="password">Password</label>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
						    </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'>Sign in</a>
                  <a class="waves-effect waves-light btn blue lighten-1" id = 'btnSignUp'>Sign up</a>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnSignUp').click(function(){
      window.location.href = '{{ URL::to("/signup") }}';
    });

    $('#btnSubmit').click(function(){
      var identifier = $('input[name=group1]:checked').val();
      if (identifier == 1){
        driverCheck();
      }else if (identifier == 2){
        enforcerCheck();
      }else if (identifier == 3){
        companyCheck();
      }
    });

    function driverCheck(){
      $.ajax({
          type: "POST",
          url: "{{action('LoginController@loginDriver')}}",
          beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
          },
          data:{
            username: $('#userName').val(),
            password: $('#password').val()
          },
          success: function(data){
            if(data){
              window.location.href = '{{ URL::to("/dashboard") }}';
            }else{
              confirm('Incorrect Login.');
            }
          },
          error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
    }

    function enforcerCheck(){
      $.ajax({
          type: "POST",
          url: "{{action('LoginController@loginEnforcer')}}",
          beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
          },
          data:{
            username: $('#userName').val(),
            password: $('#password').val()
          },
          success: function(data){
            if(data){
              window.location.href = '{{ URL::to("/dashboardEnforcer") }}';
            }else{
              confirm('Incorrect Login.');
            }
          },
          error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
    }

    function companyCheck(){
      $.ajax({
          type: "POST",
          url: "{{action('LoginController@loginCompany')}}",
          beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
          },
          data:{
            username: $('#userName').val(),
            password: $('#password').val()
          },
          success: function(data){
            if(data){
              window.location.href = '{{ URL::to("/dashboardCompany") }}';
            }else{
              confirm('Incorrect Login.');
            }
          },
          error: function(data){
            var toastContent = $('<span>Error Occured. </span>');
            Materialize.toast(toastContent, 1500,'red', 'edit');

          }
        });//ajax
    }
  });
</script>
</body>
</html>