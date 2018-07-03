@extends('master')

@section('page-title', 'Enroll - Great American Power')

@section('page-style')
	{!! Html::style('css/enroll.css?v=1') !!}
@endsection

@section('navbar-brand')
@if($promo === null)
<a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@else
<a id="nav-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
@endif
@endsection

@section('content')

<div id='enroll_container' class="container">

<div class="col-lg-6">

    {!! Form::open(['action' => 'LdcController@getElectricLdcs']) !!}

	{!! csrf_field() !!}

	<!--<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">-->
	<div class="col-lg-5">
	    {!! Form::label('zip', 'Zip Code:') !!}
		{!! Form::text('zip', null, ['class' => 'form-control']) !!}
	</div>
	<!--<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">-->
	 <div class="col-lg-3">
	    {!! Form::label('service', 'Residential') !!}
		{!! Form::radio('service','Residential', 'true') !!}
	</div>
	<!--<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">-->
	<div class="col-lg-3">    
	    {!! Form::label('service', 'Commercial') !!}
	{!! Form::radio('service','Commercial') !!}
	</div>

	{!! Form::hidden('promo', $promo) !!}

	{!! Form::hidden('type', $type) !!}

	<!--<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">-->
	<div class="col-lg-12" style="padding-top:15px;">
		{!! Form::submit('NEXT', ['class' => 'btn btn-default', 'id' => 'next']) !!}
	</div>

    {!! Form::close() !!}
 
 </div>
 
 <div class="col-lg-4 col-lg-offset-1">
 	<div class="row" style="height:50px; background-color: white;">Steps</div>
 	<div class="row" style="height:200px; background-color: red;"></div>
 	<div class="row" style="height:200px; background-color: blue;"></div>

 </div>

</div>

@endsection

@section('bottom-scripts')
	{!! Html::script('js/enroll.js') !!}
@endsection