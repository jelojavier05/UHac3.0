@extends('layouts.userDashboard')

@section('title')
	Dashboard
@endsection

@section('dashBoard')

  <div class="row">
    <div class="col s12 m4">
      <div class="card yellow darken-2">
        <div class="card-image waves-effect waves-block waves-light">
          <div class="col col s4 m4 l4">
              <img src="{!! URL::asset('../img/pup.png') !!}" alt="" class="circle responsive-img valign-wrapper profile-image" style="margin-left: 140px; margin-top: 5px;">
          </div>
        </div>
        <div class="card-content">
          <ul id="profile-page-about-details" class="collection z-depth-1">
              <li class="collection-item">
                <div class="row">
                  <div class="col s5 grey-text darken-1">Company</div>
                  <div class="col s7 grey-text text-darken-4 right-align">PUP</div>
                </div>
              </li>
              <li class="collection-item">
                <div class="row">
                  <div class="col s5 grey-text darken-1">Location</div>
                  <div class="col s7 grey-text text-darken-4 right-align">Manila</div>
                </div>
              </li>
          </ul>
          <div class="card-action center">
            <a class="waves-effect waves-light btn yellow lighten-1 activator black-text"><i class="material-icons left">edit</i>Edit Profile</a>
          </div>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4 center">Account Details<i class="material-icons right">close</i></span>
        <div>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="UhacDelaCruz" id="userName" type="text" class="validate">
                <label for="user_name">Username</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="******" id="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Juan" id="firstName" type="text" class="validate">
                <label for="firstName">First Name</label>
              </div>
              <div class="input-field col s12">
                <input placeholder="Dela Cruz" id="lastName" type="text" class="validate">
                <label for="lastName">Last Name</label>
              </div>
              <div class="input-field col s12">
                <input type="text" name="municipal" class="validate">
                <label for="municipal">Municipal</label>
              </div>
           </div>
          </form>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
            <i class="material-icons right">send</i></button>
        </div>
      </div> 
    </div>
  </div>

<div class="row">
  <div class="col s12 m8" style="margin-top:">
    <table class="striped white" style="border-radius:10px;" id="dataTable">
      <thead>
        <tr>
          <th style="width:100px;" class="green darken-3 white-text">Ticket No</th>
          <th style="width:150px;" class="green darken-3 white-text">Arresting Officer</th>
          <th style="width:150px;" class="green darken-3 white-text">Violator</th>
          <th class="blue darken-3 white-text">License No</th>
          <th class="blue darken-3 white-text">Date</th>
          <th class="blue darken-3 white-text">Status</th>
          <th class="blue darken-3 white-text">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Feb. 11, 2014</td>
          <td>Tolentino</td>
          <td>Escala</td>
          <td>00002</td>
          <td>Nakaw na tingin</td>
          <td>Death</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  $('#dataTable').on('click', '.btnPay',function(){
    var id = this.id;
    $.ajax({

      type: "POST",
      url: "{{action('dashboardCompanyController@paymentInCompany')}}",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        ticketID: id

      },
      success: function(data) {
        confirm('Payment Successful.');
        refreshTable();
      },
      error: function(data) {
        confirm('Error');
      }

    });//ajax
  });

  $('#dataTable').on('click', '.btnClaim',function(){
    var id = this.id;
    $.ajax({

      type: "POST",
      url: "{{action('dashboardCompanyController@claimInCompany')}}",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },
      data: {
        ticketID: id

      },
      success: function(data) {
        confirm('License Claimed.');
        refreshTable();
      },
      error: function(data) {
        confirm('Error');
      }

    });//ajax
  });
  function refreshTable(){
    $.ajax({
      type: "GET",
      url: "{{action('dashboardCompanyController@getMunicipalityTickets')}}",
      success: function(data){

        var table = $('#dataTable').DataTable();
        table.clear().draw();
        $.each(data, function(index, value) {
          var status;
          var button = ''; 
          if (value.blStatus == 0){
            status = 'Unpaid';
            button = '<a class="btn red btnPay" id = ' + value.intVHId  +'>Pay</a>';
          }else if (value.blStatus == 1){
            status = 'Paid';
            button = '<a class="btn blue btnClaim" id = ' + value.intVHId  +'>Claim</a>';
          }else if(value.blStatus == 2){
            status = 'Claimed';
            button = '<a class="btn green btnDetails" id = ' + value.intVHId  +'>Claimed</a>';
          }
          table.row.add([
            value.intVHId,
            value.strEnfoFname + ' ' + value.strEnfoLname,
            value.strDrivFname + ' ' + value.strDrivLname,
            value.strDrivLicense,
            value.datToday,
            status,
            button
          ]).draw();
        });//foreach 
      },
      error: function(data){
        var toastContent = $('<span>Error Database.</span>');
        Materialize.toast(toastContent, 1500,'red', 'edit');
      }
    });//get municpality ticketf
  }

  refreshTable();
});


</script>

<script type="text/javascript">
 $("#dataTable").DataTable({
                 "columns": [
                { "orderable": false },
                { "orderable": false },
                { "orderable": false },
                null,
                null,
                null,
                null,
                ] ,  
                "pageLength":5,
				"bLengthChange": false
            });
</script>

@endsection

