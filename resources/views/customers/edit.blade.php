@extends('admin.admin-master')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('customers.edit-fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
