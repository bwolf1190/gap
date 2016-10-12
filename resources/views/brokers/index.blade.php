@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">brokers</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('brokers.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if(empty($brokers))
                <div class="well text-center">No brokers found.</div>
            @else
                @include('brokers.table')
            @endif
        </div>



    </div>
@endsection
