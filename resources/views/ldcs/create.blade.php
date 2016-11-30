@extends('admin.admin-master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
{!! Html::style('css/admin.css') !!}
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'ldcs.store']) !!}
    {!! csrf_field() !!}
        @include('ldcs.fields')

    {!! Form::close() !!}
</div>
@endsection
