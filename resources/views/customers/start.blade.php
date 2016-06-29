@extends('master')

@section('navbar-brand')

    @if($promo === null)
        <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
    @else
        <a class="navbar-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
    @endif

@endsection


@section('carousel')

@endsection

@section('content')

<div id='enroll_container' class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'customers.store', 'id' => 'enrollment-form']) !!}
    {!! csrf_field() !!}

        @include('customers.fields')

    {!! Form::close() !!}

</div>

{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::style('css/broker.css') !!}
{!! Html::script('js/validate.js') !!}
{!! Html::script('js/enroll.js') !!}


@endsection

