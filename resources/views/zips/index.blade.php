@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Zips</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('zips.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($zips->isEmpty())
                <div class="well text-center">No Zips found.</div>
            @else
                @include('zips.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $zips])


    </div>
@endsection
