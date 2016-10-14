@extends('master')

@section('title', 'Enroll')

@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

<div id='enroll_container' class="container">
	<div id="sign-up">
    {!! Form::open(['action' => 'LdcController@internalSearch']) !!}

	{!! csrf_field() !!}

	<div class="form-group">
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
	<div class="form-group">
		{!! Form::submit('NEXT', ['class' => 'btn btn-default', 'id' => 'next']) !!}
	</div>

    {!! Form::close() !!}
</div>
</div>

{!! Html::style('css/enroll.css') !!}
{!! Html::script('js/enroll.js') !!}

@endsection
