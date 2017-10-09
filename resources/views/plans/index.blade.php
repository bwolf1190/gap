@extends('admin.admin-new2')

@section('navbar-brand')
    <a class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')

    <div id="" class="container">
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Plans</h1>
            <a class="btn btn-primary pull-right add-btn" href="/update-plans">Update</a> 
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
