@extends('admin.admin-master')

@section('content')
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Broker Enrollments</h1>
        </div>

        <select style="max-width:200px; margin-bottom:25px;" name="broker" id="input" class="form-control pull-right" onchange="location = this.value;">
            <option value="/broker-enrollments/">-- Select One --</option>
            <option value="/broker-enrollments/s">All</option>
            @foreach($brokers as $b)
                <option value="/broker-enrollments/{{ $b->promo }}">{{ $b->name }}</option>
            @endforeach
        </select>

        <div class="row">
            @if($enrollments->isEmpty())
                <div class="well text-center">No Enrollments found.</div>
            @else
                @include('broker-enrollments.table')
            @endif
        </div>
        
        @include('common.paginate', ['records' => $enrollments])
        
    </div>
@endsection
