@extends('master')

@section('page-title', 'Contact - Great American Power')

@section('page-style')
{!! Html::style('css/contact.css') !!}
{!! Html::style('css/contact-sidebar.css') !!}
@endsection

@section('navbar-brand')
<a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
<div id="contact-container" class="container animate fadeInLeft">
    @include('common.errors')
    <div class="row">
        <h1 class="contact-title col-xs-7">Contact Us</h1>
    </div>
    <div class="col-md-9">
        {!! Form::open(['route' => 'contacts.store']) !!}
        {!! csrf_field() !!}
        @include('contacts.fields')
        {!! Form::close() !!}
    </div>
    <div class="col-md-3 margin-top-30 animate fadeInLeft">
        @include('right-contact-panel')
    </div>
</div>
@endsection