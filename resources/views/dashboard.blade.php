@extends('layouts.userDashboard')

@section('title')
  Dashboard
@endsection


@section('dashBoard')
<div class="row black-text">
    <form class="col s12 black-text">
		<div class="row">       
        	<div class="col s12 m4">
         		<div class="card yellow darken-2">
    				<div class="card-image waves-effect waves-block waves-light">
						<div class="col col s4 m4 l4">
	                    	<img src="{!! URL::asset('../img/officer2.png') !!}" alt="" class="circle responsive-img valign-wrapper profile-image" style="margin-left: 135px;">
	                	</div>
    				</div>
    			<div class="card-content">
					<ul id="profile-page-about-details" class="collection z-depth-1">
                  		<li class="collection-item">
                    		<div class="row">
                      			<div class="col s5 grey-text darken-1">Name</div>
                      			<div class="col s7 grey-text text-darken-4 right-align">ABC Name</div>
                    		</div>
                  		</li>
                  		<li class="collection-item">
                    		<div class="row">
                      			<div class="col s5 grey-text darken-1">License Number</div>
                      			<div class="col s7 grey-text text-darken-4 right-align">HTML, CSS</div>
                    		</div>
                  		</li>
                	</ul>
                	<div class="card-action center">
						<a class="waves-effect waves-light btn yellow lighten-1 activator"><i class="material-icons left">edit</i>Edit Profile</a>
                	</div>
    			</div>
    			<div class="card-reveal">
      				<span class="card-title grey-text text-darken-4 center">Account Details<i class="material-icons right">close</i></span>
						<div>
							<form class="col s12">
								<div class="row">
									<div class="input-field col s6">
							          	<input placeholder="UhacDelaCruz" id="userName" type="text" class="validate">
							          	<label for="user_name">Username</label>
							        </div>
									<div class="input-field col s6">
							       		<input id="password" type="password" class="validate">
							       		<label for="password">Password</label>
							       	</div>
								    <div class="input-field col s6">
								        <input placeholder="Juan" id="firstName" type="text" class="validate">
								        <label for="firstName">First Name</label>
							        </div>
							        <div class="input-field col s6">
							          	<input placeholder="Dela Cruz" id="lastName" type="text" class="validate">
								        <label for="lastName">Last Name</label>
								    </div>
							    </div>
								<div class="input-field col s12">
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
							</form>
							<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
    						<i class="material-icons right">send</i></button>
						</div>
    			</div>
  			</div>		
		</div>

		<div class="col s12 m4">

		    <div class="card-panel red">
          		<span class="white-text center"><h4>Violations</h4>
          		</span>
        	</div>

			<div class="card red">
				<div class="card-content">
					<div class="row">
						<div class="col s12">
							<ul class="collection">
						      	<li class="collection-item">11/20/2016</li>
						      	<li class="collection-item">Carlo Jumagdao</li>
						      	<li class="collection-item">Manila City Hall</li>
						    </ul>
							<ul class="collapsible" data-collapsible="accordion">
								<li>
								  <div class="collapsible-header"><img src="{!! URL::asset('../img/error.png') !!}" style="height: 30px; width: 30px;" class="right">  Beating the red light</div>
								  <div class="collapsible-body white"><p>Details.</p>
								  </div>
								</li>
								<li>
								  <div class="collapsible-header" style=""><img src="{!! URL::asset('../img/error.png') !!}" style="height: 30px; width: 30px;" class="right">  No License</div>
								  <div class="collapsible-body white"><p>Details.</p>
								  </div>
								</li>
							 </ul>
						</div>
					</div> 
				</div>
				<div class="card-action center">
        			<a class="waves-effect waves-light btn red lighten-2"><i class="material-icons left">payment</i>Bank</a>
					<a class="waves-effect waves-light btn red lighten-2" id = 'btnSubmit'><i class="material-icons right">print</i>PDF</a>
        		</div>
			</div>           	
		</div>

		<div class="col s12 m4">
		    <div class="card-panel green">
          		<span class="white-text center"><h4>Transaction History</h4>
          		</span>
        	</div>

	  		<div class="card green">
            	<div class="card-content">
				 		<ul class="collection">
				    	<li class="collection-item avatar">
				      	<img src="{!! URL::asset('../img/officer.png') !!}"" alt="" class="circle">
				      	<span class="title">Date</span>
				      	<p>Enforcer's Name<br>
				         Amount<br>
				         Violation/s
				      	</p>
				    	</li>
				    	<li class="collection-item avatar">
				      	<img src="{!! URL::asset('../img/officer2.png') !!}"" class="circle">
				      	<span class="title">Date</span>
				      	<p>Enforcer's Name<br>
				         Amount<br>
				         Violation/s
				    	</li>
				  		</ul>
            	</div>
            	
            		<div class="card-action">
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
