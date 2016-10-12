@extends('master')

@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
<div class="container">
	 @include('faqs.show_fields')
</div>
@endsection
