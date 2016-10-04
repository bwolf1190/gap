@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
<div class="container">
	<?php  var_dump($enrollment);  ?>
	 
</div>
@endsection
