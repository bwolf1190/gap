@extends('master')

{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/broker.css') !!}

@section('navbar-brand')

    <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>

@endsection


@section('content')

<div id='enroll_container' class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'customers.store', 'id' => 'enrollment-form']) !!}
    {!! csrf_field() !!}

        @include('internal-enrollments.form')

    {!! Form::close() !!}

</div>


{!! Html::script('js/validate.js') !!}
{!! Html::script('js/enroll.js') !!}


@endsection

