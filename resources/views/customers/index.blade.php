@extends('admin.admin-master')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Customers</h1>
            <a class="btn btn-primary pull-right add-new-btn admin-top-btn" style="margin-top: 25px" href="{!! route('customers.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($customers->isEmpty())
                <div class="well text-center">No Customers found.</div>
            @else
                @include('customers.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $customers])


    </div>
@endsection
