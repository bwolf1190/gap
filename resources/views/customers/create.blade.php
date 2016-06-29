@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

<div id='enroll_container' class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'customers.store']) !!}
    	{!! csrf_field() !!}
        @include('customers.fields')

    {!! Form::close() !!}
</div>

{!! Html::style('css/enroll.css') !!}
{!! Html::script('../js/enroll.js') !!}

@endsection
