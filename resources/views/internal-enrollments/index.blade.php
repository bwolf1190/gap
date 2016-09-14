@extends('admin.admin-master')

@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
{!! Html::style('css/admin.css') !!}
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Internal Enrollments</h1>
            <a class="btn btn-primary pull-right admin-top-btn" style="margin-top: 25px" href="{!! route('internalEnrollments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($enrollments->isEmpty())
                <div class="well text-center">No Internal Enrollments found.</div>
            @else
                @include('internal-enrollments.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $enrollments])

    </div>
@endsection
