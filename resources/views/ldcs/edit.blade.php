@extends('admin.admin-master')

@section('content')

{!! Html::style('css/admin.css') !!}
<div class="container">

    @include('common.errors')

    {!! Form::model($ldc, ['route' => ['ldcs.update', $ldc->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('ldcs.fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
