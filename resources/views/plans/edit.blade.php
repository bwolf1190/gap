@extends('admin.admin-master')

@section('content')

{!! Html::style('css/admin.css') !!}

<div id="plans-container" class="container">

    @include('common.errors')

    {!! Form::model($plan, ['route' => ['plans.update', $plan->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('plans.fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
