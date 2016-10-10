@extends('brokers.admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')
<div class="container">

    @include('common.errors')

    {!! Form::model($subagent, ['route' => ['subagents.update', $subagent->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
        @include('brokers.admin.subagents.fields')

    {!! Form::close() !!}
</div>
@endsection
