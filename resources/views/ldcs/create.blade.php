@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'ldcs.store']) !!}
    {!! csrf_field() !!}
        @include('ldcs.fields')

    {!! Form::close() !!}
</div>
@endsection
