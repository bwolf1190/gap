@extends('admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')

    <div class="container">
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Plans</h1>
            <li class="export"><span class="glyphicon glyphicon-download-alt pull-right">{!! Html::linkAction('BrokerController@exportPlans', 'Export', array('broker' => Auth::user()->name)) !!}</span></li>
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
