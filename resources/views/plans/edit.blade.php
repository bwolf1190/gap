@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($plan, ['route' => ['plans.update', $plan->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
        @include('plans.fields')

    {!! Form::close() !!}
</div>
@endsection
