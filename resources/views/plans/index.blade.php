@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Plans</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('plans.create') !!}">Add New</a>
        </div>
        <div class="row">
            @if(empty($plans))
                <div class="well text-center">No Plans found.</div>
            @else
                @include('plans.table')
            @endif
        </div>
        @include('common.paginate', ['records' => $plans])
    </div>
@endsection
