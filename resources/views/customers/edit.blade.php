@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
        @include('customers.fields')

    {!! Form::close() !!}
</div>
@endsection
