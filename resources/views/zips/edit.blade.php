@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($zip, ['route' => ['zips.update', $zip->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
        @include('zips.fields')

    {!! Form::close() !!}
</div>
@endsection
