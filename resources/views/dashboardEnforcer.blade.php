@extends('layouts.userDashboard')

@section('title')

@endsection


@section('dashBoard')

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
                  <div class="col s5 grey-text darken-1">Municipal</div>
                  <div class="col s7 grey-text text-darken-4 right-align">HTML, CSS</div>
                </div>
              </li>
          </ul>
          
          <ul class="collapsible" data-collapsible="accordion">
            <li>
              <div class="collapsible-header black-text"><span class="new badge blue darken-2 white-text" data-badge-caption="custom caption" style="margin-right: 10px;">4</span>Total Arrests</div>
              <div class="collapsible-body white black-text center"><p>69 arrests</p></div>
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

  <div class="col s12 m6">
    <table class="bordered highlight" style="border-style: solid;">
      <thead>
        <tr>
          <th data-field="id">Date</th>
          <th data-field="name">Violator's Name</th>
          <th data-field="price">License Number</th>
          <th data-field="">Violation/s</th>
          <th data-field="">More</th>
       </tr>
      </thead>

      <tbody>
        <tr>
          <td>03/11/2017</td>
          <td>Escala</td>
          <td>00002</td>
          <td>Minahal si Lala</td>
          <td><a href="#!" class="secondary-content"><i class="material-icons">send</i></a></td>
        </tr>
        <tr>
          <td>05/12/2015</td>
          <td>Abilar</td>
          <td>00001</td>
          <td>Nakipaghiwalay kay Mon</td>
          <td><a href="#!" class="secondary-content"><i class="material-icons">send</i></a></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col s12 m2">
    <div class="row">
      <div class="col s12 m12">
        <div class="card-panel grey lighten-2">
          <h6>Violation Summary</h6><br>
          <span class="black-text">
          License Type<br>
          Restriction <br>
          Amount
          </span>
        </div>
      </div>
    </div>
  </div>

@endsection
