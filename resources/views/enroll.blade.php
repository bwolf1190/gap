@extends('master')

@section('page-title', 'Enroll - Great American Power')

@section('page-style')
	{!! Html::style('css/enroll.css') !!}
@endsection

@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')

<div id='enroll_container' class="container">

    {!! Form::open(['action' => 'LdcController@search']) !!}

	{!! csrf_field() !!}

	<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	    {!! Form::label('zip', 'Zip Code:') !!}
		{!! Form::text('zip', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	    {!! Form::label('service', 'Residential') !!}
		{!! Form::radio('service','Residential', 'true') !!}
	</div>
	<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	    {!! Form::label('service', 'Commercial') !!}
		{!! Form::radio('service','Commercial') !!}
	</div>

	{!! Form::hidden('type', $type) !!}

	<div class="form-group col-sm-5 col-xs-9  col-xs-offset-2 col-sm-offset-3 col-lg-5 col-lg-offset-3">
		{!! Form::submit('NEXT', ['class' => 'btn btn-default', 'id' => 'next']) !!}
	</div>

    {!! Form::close() !!}
    
</div>

@endsection

@section('bottom-scripts')
	{!! Html::script('js/enroll.js') !!}
@endsection