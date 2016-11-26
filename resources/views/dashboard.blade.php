@extends('layouts.userDashboard')

@section('title')
  Dashboard
@endsection

@section('dashBoard')
<div class="row black-text">
    <form class="col s12 black-text">
      	<div class="row">

        	<div class="input-field col s6">
          		<input placeholder="N01-04-01***" id="licenseNumber" type="text" class="validate">
          		<label for="license">License Number</label>
        	</div>
        	<div class="input-field col s6">
			    <select id = 'licenseTypes'>
				    <option value="1">Student</option>
				    <option value="2">Non Pro</option>
			        <option value="3">Pro</option>
			    </select>
			    <label>License Type</label>
		  	</div>
          	<div class="input-field col s12">
			    <select multiple id = 'restriction'>
			      	<option value="1">1 Motorcycles / Motorized Tricycles</option>
			      	<option value="2">2 Vehicle up to 4500 KGS GVW</option>
			      	<option value="3">3 Vehicle above 4500 KGS GVW</option>
			      	<option value="4">4 Automatic clutch up to 4500 KGS GVW</option>
			      	<option value="5">5 Automatic clutch above 4500 KGS GVW</option>
			      	<option value="6">6 Articulated vehicle 1600 KGS GVW and below</option>
			      	<option value="7">7 Articulated vehicle 1601 up to 4500 KGS GVW</option>
			      	<option value="8">8 Articulated vehicle 4501 KGS and above GVW</option>
			    </select>
			    	<label>Restriction</label>
			</div>
        	<div class="input-field col s4">
          		<input placeholder="Juan" id="firstName" type="text" class="validate">
          		<label for="first_name">First Name</label>
        	</div>
        	<div class="input-field col s4">
          		<input placeholder="Cruz" id="lastName" type="text" class="validate">
          		<label for="last_name">Last Name</label>
        	</div>
        	<div class="input-field col s4">
          		<input placeholder="Dela" id="middleName" type="text" class="validate">
          		<label for="middle_name">Middle Name</label>
        	</div>
        	<div class="input-field col s4">
          		<input placeholder="Dela" id="accountNumber" type="text" class="validate">
          		<label for="middle_name">Account Number</label>
        	</div>
			<div class="input-field col s6">
          		<input placeholder="UhacDelaCruz" id="userName" type="text" class="validate">
          		<label for="user_name">Username</label>
        	</div>
			<div class="input-field col s6">
          		<input id="password" type="password" class="validate">
          		<label for="password">Password</label>
        	</div>
      	</div>
    </form>

</div>
<div class="card-action center">
	<a class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">cancel</i>cancel</a>
	<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'><i class="material-icons right">done</i>submit</a>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
      $('select').material_select();
      $('.slider').slider({full_width: true});
    });    
	</script>
<script type="text/javascript" src="{!! URL::asset('../js/EditAccount.js') !!}"></script>
@endsection