@extends('layouts.userDashboard')

@section('title')
  Payment
@endsection

@section('dashBoard')
<div id="basic-form" class="section">
	<div class="row">
		<div class="col s12 m12 l6">
			<div class="card-panel">
				<h4 class="header2">Payment</h4>
				<div class="row">
					<form action="{{ URL::to('/payment/add') }}" method="POST" role="form" class="col s12">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="input-field col s12">
								<input value ="{{$strCounter}}" id="transId" type="text" name="transId" readonly>
								<label for="transId">Transaction ID</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input value = "{{$strMunicName}}" id="PaidTo" type="text" name="PaidTo" readonly>
								<label for="PaidTo">Paid To:</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input value = "{{$dblTotalFine}}" id="amount" type="number" name="amount" readonly>
								<label for="amount">Amount</label>
							</div>
						</div>
						<div class="col-md-12">
                          	<center class="responsive-text">
                             	<button type="submit" class="waves-effect waves-light btn"><i class="mdi-navigation-check"></i>Pay</button>
                            </center> 
                        </div>
					</form>
				</div>
			</div>
		</div>
		<div class="col s12 m12 l6">
			<table>
				<thead>
					<tr>
					<th data-field="id">#</th>
					<th data-field="Violation">Violation</th>
					<th data-field="Fine">Fine</th>
					</tr>
				</thead>
				<tbody>
					<?php $intCounter = 0?>
					@foreach($TransactionDetails AS $detail)
					<tr>
						<td>{{++$intCounter}}</td>
						<td>{{$detail->strRuleDesc}}</td>
						<td>P {{number_format($detail->dblRuleFine)}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<h4 class="right">Total: P {{number_format($dblTotalFine)}}</h4>
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
