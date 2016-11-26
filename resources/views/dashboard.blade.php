@extends('layouts.userDashboard')

@section('title')
  Dashboard
@endsection


@section('dashBoard')

	<div class="row">
  		<div class="col s12 m4 l4">
    		<div class="card horizontal">
		      	<div class="card-image">
		        	<img src="{!! URL::asset('../img/officer2.png') !!}" style="height: 150px; width: 150px; margin-left: 140px;">
		      	</div>
      	
      		<div class="card">
	        	<div class="card-content yellow darken-2">
	        		<br>
	          		<p><h5 class="center">{{$FullName}}</h5></p>
	          	 	   <h6 class="center">{{$License}}</h6>
	          	 	   <h6 class="center">{{$LicenseType}}</h6>
	          	 	   <!-- <h6 class="center">{{$datExpiration}}</h6> -->
	          	 	<br>
	        	</div>
	        	<div class="card-action yellow darken-1 center">
					<a class="btn yellow lighten-1 black-text activator" href="#modal1"><i class="material-icons left">edit</i>Edit Profile</a>
	       		</div>
	       		<div class="card-reveal">
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
						</div>
					</form>
						<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
						<i class="material-icons right">send</i></button>
			    </div>
	       	</div>
	       	</div>
	    </div>

	    <div class="col s12 m4 l4">

			<div class="card red darken-2">
				<div class="card-content">
					<div class="row">
						<div class="col s12">
							<ul class="collection with-header">
								<li class="collection-header"><h5 class="center">Violation</h5></li>
<<<<<<< HEAD
								@if($intVioCounter > 0)
						      	<li class="collection-item">{{$datViolationDay}}</li>
						      	<li class="collection-item">Officer: {{$strEnfoFullName}}</li>
						      	<li class="collection-item">Location: {{$strMunicipal}}</li>
						      	@else
						      	<li class="collection-item center">You don't have any violation!</li>
						      	@endif
=======
						      	<li class="collection-item">Jan. 20, 2016</li>
						      	<li class="collection-item">Officer Carlo<a href="#!" class="secondary-content" type="button" value="Click Me" onclick="getValue();"><img src="{!! URL::asset('../img/report.png') !!}" style="height:30px; width: 30px; margin-top: -5px;" class="secondary-content"></a></li>
						      	<li class="collection-item">Manila City Hall</li>
>>>>>>> origin/master
						    </ul>
							<ul class="collapsible" data-collapsible="accordion">
								@foreach($ViolationDetails AS $detail)
								<li>
								  <div class="collapsible-header"><span><h6 class="right">{{$detail->dblRuleFine}}</h6></span>{{$detail->strRuleDesc}}</div>
								  <div class="collapsible-body white"><p>Details.</p>
								  </div>
								</li>
								@endforeach
							 </ul>
							 <h6 class="right">Total Amount:</h6>
						</div>
					</div> 
				</div>
				<div class="card-action center red darken-1">
        			<a class="waves-effect waves-light btn red lighten-1" type="button" value="Click Me" onclick="getConfirmation();"><i class="material-icons left">payment</i>Bank</a>
					<a class="waves-effect waves-light btn red lighten-1" id = 'btnSubmit'><i class="material-icons right">print</i>PDF</a>
        		</div>
			</div>	    	
	    </div>

	    <div class="col s12 m4 l4">
            <table class="striped white" style="border-radius:10px;" id="dataTable">
                <thead>
                    <tr>
                        <th style="width:100px;" class="green darken-3 white-text">Date</th>
                        <th style="width:150px;" class="green darken-2 white-text">Arresting Officer</th>
						<th style="width:150px;" class="green darken-1 white-text">Amount</th>
                        <th class="green white-text">Violation/s</th>
                    </tr>
                </thead>

                <tbody>
                	<tr>
                		<td>Feb. 11, 2014</td>
                		<td>Tolentino</td>
                		<td>Escala</td>
                		<td>00002</td>
                	</tr>
                </tbody>
            </table>	
	    </div>

		<script type="text/javascript">
		 $("#dataTable").DataTable({
		                 "columns": [
		                { "orderable": false },
		                { "orderable": false },
		                { "orderable": false },
		                null,
		                ] ,  
		                "pageLength":5,
						"bLengthChange": false
		            });
		</script>
	
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

<script type="text/javascript">
 <!--
    function getConfirmation(){
       var retVal = confirm("Do you want to continue ?");
       if( retVal == true ){
          document.write ("User wants to continue!");
          return true;
       }
       else{
          document.write ("User does not want to continue!");
           
           document.location.href = "/dashboard";

       }
    }
 //-->
</script>

<script type="text/javascript">
 <!--
    function getValue(){
       var retVal = prompt("Enter your complaint : ", "your complaint here");
       document.write("You have entered : " + retVal);
    }
 //-->
</script>
@endsection
