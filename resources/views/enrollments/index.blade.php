@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Enrollments</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('enrollments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($enrollments->isEmpty())
                <div class="well text-center">No Enrollments found.</div>
            @else
                @include('enrollments.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $enrollments])


    </div>
@endsection
