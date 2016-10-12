@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
<div class="container">
	 @include('contacts.show_fields')
</div>
@endsection
