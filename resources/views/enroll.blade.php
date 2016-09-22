@extends('master')
@section('title', 'Enroll')
@section('page-style')
    {!! Html::style('css/contact.css') !!}
    {!! Html::style('css/contact-sidebar.css') !!}
@endsection
@section('navbar-brand')
<a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection
@section('content')

<div id='enroll_container' class="container">
	<div id="zip-form-container" class="col-xs-9 col-sm-8 col-md-6 col-lg-6 col-xs-offset-3 col-md-offset-2 col-lg-offset-2">
		{!! Form::open(['action' => 'LdcController@search']) !!}
		{!! csrf_field() !!}
		<div class="form-group" style="max-width:300px;">
			<div id="enroll-title"><h1>Enroll Now</h1></div>
			{!! Form::label('zip', 'Zip Code:') !!}
			{!! Form::text('zip', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('service', 'Residential') !!}
			{!! Form::radio('service','Residential', 'true') !!}
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
	<div id="enroll-contact-container" class="col-xs-9 col-sm-3 col-md-4 col-lg-4 col-xs-offset-3">
		@include('right-contact-panel')
	</div>

</div>

@endsection
@section('bottom-style')
{!! Html::style('css/enroll.css') !!}
@endsection
@section('bottom-scripts')
{!! Html::script('js/enroll.js') !!}
@endsection