@extends('master')

@section('title', 'Contact Us')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

<div class="container">

    @include('common.errors')

        <div class="row">
            <h1 class="contact-title col-xs-7">Message Us</h1>
        </div>


    <div id="contact-form" class="col-xs-8 col-xs-offset-2">

        {!! Form::open(['route' => 'contacts.store']) !!}
        	{!! csrf_field() !!}
            @include('contacts.fields')

        {!! Form::close() !!}

    </div>
    @include('contact-sidebar')

</div>

{!! Html::style('css/contact.css') !!}
{!! Html::style('css/contact-sidebar.css') !!}

@endsection
