@extends('master')

{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/broker.css') !!}

@section('navbar-brand')

    @if($promo === null)
        <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
    @else
        <a id="nav-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
    @endif

@endsection


@section('carousel')

@endsection

@section('content')

<div id='enroll_container' class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'customers.store', 'id' => 'enrollment-form', 'files' => true]) !!}
    {!! csrf_field() !!}

        @include('customers.fields')

    {!! Form::close() !!}

</div>


{!! Html::script('js/validate.js') !!}
{!! Html::script('js/enroll.js') !!}


@endsection

