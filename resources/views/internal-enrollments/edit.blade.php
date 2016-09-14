@extends('admin.admin-master')

@section('content')
<!-- Copied file from enrollments
	 Need to create route resource for Internal Enrollments
  -->
<div class="container">
{!! Html::style('css/admin.css') !!}
    @include('common.errors')

    {!! Form::model($internalEnrollment, ['route' => ['internalEnrollments.update', $internalEnrollment->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('enrollments.fields')
    </div>

    {!! Form::close() !!}
</div>
@endsection
