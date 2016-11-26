@extends('layouts.main')

@section('title')
	Test
@endsection


@section('body')

<h5>TETETETETETETETETE</h5>

        	<div class="col s12 m8 push-m6">
          		<div class="card" style="opacity: -10px;">
            		<div class="card-content white-text" style="border-radius: 100px;">
              			<div class="card-title">
                            <div class="valign-wrapper center-align">
                                <div class="col s3">
                                <img src="{!! URL::asset('../img/officer.png') !!}" class="responsive-img"/>
                                </div>
                                <div class="col s9">
                                    <h2 class="black-text">VIOLATION SUMMARY</h2>
                                </div>
                            </div>
                        </div>
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
                                                <label id="DriverLicenseNo" class="col s6 m3">N01-04-01***</label>
                                            
                                                <label class="col s6 m3">Driver Name:</label>
                                                <label id="DriverName" class="col s6 m3">Dela Cruz Juan</label>
                                            
                                                <label class="col s6">License Type:</label>
                                                <label id="DriverLicenseType" class="col s6">NON_PROFESSIONAL</label>
                                            
                                                <label class="col s6">Restriction:</label>
                                                <label id="DriverRestriction" class="col s6">1,2</label>
                                                
                                                <label class="col s6">Driver License Expiration:</label>
                                                <label id="DriverLicenseExpiration" class="col s6">2017-11-05</label>
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
                                                      <tr>
                                                        <td>Violation 1</td>
                                                        <td>Php 200.00</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Violation 2</td>
                                                        <td>Php 500.00</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Violation 3</td>
                                                        <td>Php 300.00</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Total Fine:</td>
                                                        <td>Php 1000.00</td>
                                                      </tr>    
                                                    </tbody>
                                                  </table>
                                            </div>
                                        </div>
							         </form>
						    </div>
            		</div>
            		<div class="card-action center">
	            		<a class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">back</i>back</a>
						<a class="waves-effect waves-light btn green lighten-1" id = 'btnSubmit'><i class="material-icons right">done</i>submit</a>
            		</div>
          		</div>
        	</div>
      	</div>
	</div>
	





@endsection