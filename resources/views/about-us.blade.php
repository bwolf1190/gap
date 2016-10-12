@extends('master')

@section('navbar-brand')

	{!! Html::style('css/about-us.css') !!}
	{!! Html::style('css/welcome.css') !!}
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('title', 'About Us')



@section('content')
<div id="about-container">
<span class="fa fa-pinterest" style="color:#bf0000;"></span>

</div>
@endsection

