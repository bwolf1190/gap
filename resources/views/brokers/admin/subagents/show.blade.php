@extends('brokers.admin.admin-master')

@section('content')

@include('brokers.admin.broker-actions')
<div class="container">
	 @include('brokers.admin.subagents.show_fields')
</div>
@endsection
