@extends('brokers.admin.admin-master')

@section('content')


@include('brokers.admin.broker-actions')

    <div id="plans-container" class="container">
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Plans</h1>
            
        </div>
        <div class="row">
            @if(empty($plans))
                <div class="well text-center">No Plans found.</div>
            @else
                @include('brokers.admin.broker-plans.table')
            @endif
        </div>
        @include('common.paginate', ['records' => $plans])
    </div>
    
@endsection
