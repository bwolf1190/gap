@extends('admin.admin-master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
{!! Html::style('css/admin.css') !!}
    <div class="container">

        <div class="row">
            <h1 class="pull-left">Ldcs</h1>
            <a class="btn btn-primary pull-right admin-top-btn" style="margin-top: 25px" href="{!! route('ldcs.create') !!}">Add New</a>
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
