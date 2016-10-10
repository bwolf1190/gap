@extends('brokers.admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')

<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'subagents.store']) !!}
    {!! csrf_field() !!}
        @include('brokers.admin.subagents.fields')

    {!! Form::close() !!}
</div>
@endsection
