@extends('master')

@section('page-title')
    Enroll - Great American Power
@endsection

@section('page-style')
	{!! Html::style('css/enroll.css') !!}
	{!! Html::style('css/welcome-2.css') !!}
@endsection

@section('navbar-brand')
@if($promo === null)
<a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@else
<a id="nav-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
@endif
@endsection
@section('content')
<div id="content" class="container">
	<div class="row margin-top-30">
                <!-- Carousel Slideshow -->
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <!-- Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!-- End Carousel Indicators -->
                    <!-- Carousel Images -->
                    <div class="carousel-inner">
                        <div class="item active">
                            {!! Html::image('images/house-lights_1060-510.jpg', 'slide1') !!}
                            <div class="carousel-caption">
                                <h1>Great American Power</h1>
                                <h3 style="color:lightgray;">We supply the same energy you currently receive, often at lower prices, with no interruption in service. </h3>
                            </div>
                        </div>
                        <div class="item">
                            {!! Html::image('images/bakery-short-short.jpg', 'slide2') !!}
                            <div class="carousel-caption">
                                <h1>Great American Power</h1>
                                <h3 style="color:lightgray;">We are here for your home, or your business. It’s your choice to make, and the time is now to start managing and securing your energy needs.</h3>
                            </div>
                        </div>
                        <div class="item">
                            {!! Html::image('images/house-home-green_1060-510.jpg', 'slide1') !!}
                            <div class="carousel-caption">
                                <h1>Great American Power</h1>
                                <h3 style="color:lightgray;">We believe in the power of healthy competitive markets that benefit consumers by providing great choices.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Carousel Slideshow -->
</div>
</div>
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
			{!! Form::radio('service','Commercial') !!}
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
	
	{!! Html::style('css/master.css') !!}
@endsection

@section('bottom-scripts')
	{!! Html::script('js/enroll.js') !!}
@endsection