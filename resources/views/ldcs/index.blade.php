@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

    <div class="container">

        <div class="row">
            <h1 class="pull-left">Ldcs</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ldcs.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if(empty($ldcs))
                <div class="well text-center">No Ldcs found.</div>
            @else
                @include('ldcs.table')
            @endif
        </div>



    </div>
@endsection
