@extends('brokers.admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')

    <div class="container">   
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Subagents</h1>
        </div>
        <div class="row">
            @if(empty($subagents))
                <div class="well text-center">No Subagents found.</div>
            @else
                @include('brokers.admin.subagents.table')
            @endif
        </div>
        @include('common.paginate', ['records' => $subagents])
    </div>
    
@endsection
