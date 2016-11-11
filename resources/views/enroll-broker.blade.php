@extends('master')

@section('page-title')
    Enroll - Great American Power
@endsection

@section('page-style')
	{!! Html::style('css/enroll.css') !!}
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
	<div id="enroll-title"><h1>Enroll Now</h1></div>
	<div id="sign-up">
		{!! Form::open(['action' => 'LdcController@brokerLdcs']) !!}
		<div class="form-group">
			{!! Form::label('zip', 'Zip Code:') !!}
			{!! Form::text('zip', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('promo', 'Promo:') !!}
			{!! Form::text('promo', $promo, ['class' => 'form-control', 'readonly' => true]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('service', 'Residential') !!}
			{!! Form::radio('service','Residential', true) !!}
		</div>
		<div class="form-group">
			{!! Form::label('service', 'Commercial') !!}
			{!! Form::radio('service','Commmercial') !!}
		</div>
		{!! Form::hidden('type', $type) !!}
		<div class="form-group">
			{!! Form::submit('NEXT', ['class' => 'btn btn-default', 'id' => 'next']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('powered-by-gap')
@if($promo !== null)
<div id="" class="" style="max-width:400px; margin:0 auto;">
	{!! Html::image('images/powered-by-gap-trans.png', '', array('class' => 'form-group')) !!}
</div>
@endif
@endsection
@section('bottom-style')
	{!! Html::style('css/enroll.css') !!}
	{!! Html::style('css/welcome.css') !!}
	{!! Html::style('css/master.css') !!}
@endsection

@section('bottom-scripts')
	{!! Html::script('js/enroll.js') !!}
@endsection