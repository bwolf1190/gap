@extends('admin.admin-new2')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
    	<div class="row">
    		<h1 class="text-center">{!! $customer->fname . ' ' . $customer->lname . ' - ' . $customer->acc_num !!}</h1>
    	</div>
        @include('customers.edit-fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
