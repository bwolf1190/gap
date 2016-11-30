@extends('admin.admin-master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')

{!! Html::style('css/admin.css') !!}

<div id="admin-container" class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'plans.store']) !!}
    {!! csrf_field() !!}
        @include('plans.fields')

    {!! Form::close() !!}
</div>
@endsection
