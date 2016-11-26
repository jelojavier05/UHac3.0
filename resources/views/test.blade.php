@extends('layouts.main')

@section('title')
	Test
@endsection


@section('body')

<h5>TETETETETETETETETE</h5>

<!--Basic collapsible-->
<div class="row">
	<div class="col s10 push-s1">
		<ul class="collapsible" data-collapsible="accordion">
			<li>
			  <div class="collapsible-header">First</div>
			  <div class="collapsible-body"><p>Test 1</p></div>
			</li>
			<li>
			  <div class="collapsible-header">Second</div>
			  <div class="collapsible-body"><p>Test 2</p></div>
			</li>
			<li>
			  <div class="collapsible-header">Third</div>
			  <div class="collapsible-body"><p>Test 3</p></div>
			</li>
		 </ul>
	</div>
</div>

<!---------------------->

<div class="row"></div>
<!--popout-->

<div class="row">
	<div class="col s10 push-s1">
		<ul class="collapsible popout" data-collapsible="accordion">
			<li>
			  <div class="collapsible-header">First</div>
			  <div class="collapsible-body"><p>Test 1</p></div>
			</li>
			<li>
			  <div class="collapsible-header">Second</div>
			  <div class="collapsible-body"><p>Test 2</p></div>
			</li>
			<li>
			  <div class="collapsible-header">Third</div>
			  <div class="collapsible-body"><p>Test 3</p></div>
			</li>
		 </ul>
	</div>
</div>



@endsection