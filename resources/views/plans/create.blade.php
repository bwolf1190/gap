@extends('admin.admin-new2')

@section('content')

<div class="container">
	<div id="fields-container">
    @include('common.errors')

    {!! Form::open(['route' => 'plans.store']) !!}
    {!! csrf_field() !!}

        @include('plans.fields')

    {!! Form::close() !!}
    </div>
</div>
@endsection
