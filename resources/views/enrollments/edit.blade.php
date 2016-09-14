@extends('admin.admin-master')

@section('content')

<div class="container">
{!! Html::style('css/admin.css') !!}
    @include('common.errors')

    {!! Form::model($enrollment, ['route' => ['enrollments.update', $enrollment->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('enrollments.fields')
    </div>

    {!! Form::close() !!}
</div>
@endsection
