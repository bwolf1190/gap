@extends('admin.admin-new2')

@section('content')

<div class="container">

    @include('common.errors')

    {!! Form::model($plan, ['route' => ['plans.update', $plan->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
	<div class="row">
	    <h1 class="text-center">{!! $plan->ldc . ' - ' . $plan->type !!}</h1>
	</div>
        @include('plans.fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
