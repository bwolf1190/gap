@extends('master')

@section('title', 'Enroll')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection


@section('carousel')

<!--
{!! Html::image('images/american-small.png', 'enroll-circle', array('class' => 'img-square img-responsive img-center')) !!}
-->


@endsection



@section('content')


<div id='enroll_container' class="container">

    {!! Form::open(['action' => 'LdcController@search']) !!}

	{!! csrf_field() !!}

	<div class="form-group col-sm-5 col-xs-4 col-xs-offset-3 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	     {!! Form::label('zip', 'Zip Code:') !!}
		{!! Form::text('zip', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-sm-5 col-xs-4 col-xs-offset-3 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	     {!! Form::label('service', 'Residential') !!}
		{!! Form::radio('service','Residential') !!}
	</div>
	<div class="form-group col-sm-5 col-xs-4 col-xs-offset-3 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	     {!! Form::label('service', 'Commercial') !!}
		{!! Form::radio('service','Commmercial') !!}
	</div>
	<div class="form-group col-sm-5 col-xs-4 col-xs-offset-3 col-sm-offset-3 col-lg-5 col-lg-offset-3">
		{!! Form::submit('NEXT', ['class' => 'btn btn-default', 'id' => 'next']) !!}
	</div>

    {!! Form::close() !!}
    
</div>


{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::script('js/enroll.js') !!}

@endsection
