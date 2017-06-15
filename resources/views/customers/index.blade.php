@extends('admin.admin-new2')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Customers</h1>
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
