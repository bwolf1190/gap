@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">
	<?php  var_dump($input);  ?>
	 @include('customers.show_fields')
	 <a href="{!! route('addEnrollment', [$customer->id]) !!}"><i class="glyphicon glyphicon-ok"></i></a>
</div>
@endsection
