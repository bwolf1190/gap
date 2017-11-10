@extends('master')

@section('page-title', 'Sign Up - Great American Power')

@section('page-style')
    {!! Html::style('css/enroll.css?v=1') !!}
    {!! Html::style('css/broker.css') !!}
@endsection

@section('navbar-brand')

    @if($promo === null)
        <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
    @else
        <a id="nav-brand" onclick="location.reload();"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
    @endif

@endsection

@section('content')

<div id='enroll_container' class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'customers.store', 'id' => 'enrollment-form', 'files' => true]) !!}
    {!! csrf_field() !!}

        @include('customers.fields')

    {!! Form::close() !!}

</div>
@endsection

@section('bottom-scripts')

{!! Html::script('js/validate.js?v=8') !!}
{!! Html::script('js/enroll.js?v=1') !!}

@endsection

