@extends('broker-master')



@section('content')

<div id='enroll_container' class="container">

    {!! Form::open(['action' => 'LdcController@brokerLdcs']) !!}

	<div class="form-group col-sm-5 col-xs-4 col-xs-offset-3 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	     {!! Form::label('zip', 'Zip Code:') !!}
		{!! Form::text('zip', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-sm-5 col-xs-4 col-xs-offset-3 col-sm-offset-3 col-lg-5 col-lg-offset-3">
	     {!! Form::label('promo', 'Promo:') !!}
		{!! Form::text('promo', $promo, ['class' => 'form-control', 'readonly' => true]) !!}
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

@endsection

@section('powered-by-gap')

    @if($promo !== null)
        <div id="powered-by-gap" class="col-xs-6 col-xs-offset-3">
            {!! Html::image('images/powered-by-gap-trans.png', 'footer-brand-img', array('class' => 'footer-brand-img')) !!}
        </div>
    @endif

@endsection


{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::script('js/enroll.js') !!}