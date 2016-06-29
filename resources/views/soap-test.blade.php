@extends('master')

@section('title', 'Enroll')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')


<div class="container">
	{{ $xml_string }}
	<br><br>
	{{ $response }}
</div>

{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::script('js/enroll.js') !!}

@endsection