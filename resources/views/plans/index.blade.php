@extends('admin.admin-master')

@section('navbar-brand')
    <a class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')

{!! Html::style('css/admin.css') !!}
    <div id="plans-container" class="container">
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Plans</h1>
            <a class="btn btn-primary pull-right admin-top-btn" style="margin-top: 25px;" href="{!! route('update-plans') !!}">Update Plans</a>
            
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
