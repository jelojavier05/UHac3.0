@extends('layouts.userDashboard')

@section('title')

@endsection


@section('dashBoard')

    <div class="row">
        <div class="row">
            <br><br>
            <div class="col s12 m6 l6">
                
    		<div class="card horizontal">
      		<div class="card">
	        	<div class="card-content yellow darken-2">
                    <div class="valign-wrapper">
                        <div class="col s3">
                            <img src="{!! URL::asset('../img/officer2.png') !!}" class="responsive-img">
                        </div>
                        <div class="col s9">
                            <br>
                            <p><h5 class="center">Ricardo Dalisay</h5></p>
                               <h6 class="center">Pasig City</h6>
                            <br>
                        </div>
                    </div>
                    
	        	</div>
	        	<div class="card-action yellow darken-1 center">
					<a class="btn yellow lighten-1 black-text activator" href="#modal1"><i class="material-icons left">edit</i>Edit Profile</a>
                    <a class ="btn red">TICKET DRIVER</a>
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
							<div class="input-field col s6">
								<input placeholder="City" id="municipality" type="text" class="validate">
								<label for="lastName">Municipality</label>
							</div>
						</div>
					</form>
						<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
						<i class="material-icons right">send</i></button>
			    </div>
	       	</div>
	       	</div>
	    

	    
            </div>
        
            <div class="col s12 m6 l6">
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header green white-text"><span class="new badge blue darken-2 white-text" data-badge-caption="custom caption">4</span>Total Arrests</div>
                          <div class="collapsible-body white green lighten-5 black-text center"><p>69 arrests</p></div>
                        </li>
                    </ul>
                </div>
                <div class="col s12">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header white-text red"><span class="new badge blue darken-2 white-text" data-badge-caption="custom caption">5</span>Drivers Complains to You</div>
                          <div class="collapsible-body white black-text red lighten-5 center"><p>9 drivers</p></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
