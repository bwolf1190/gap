@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($enrollment, ['route' => ['enrollments.update', $enrollment->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
        @include('enrollments.fields')

    {!! Form::close() !!}
</div>
@endsection
