@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
        @include('contacts.fields')

    {!! Form::close() !!}
</div>
@endsection
