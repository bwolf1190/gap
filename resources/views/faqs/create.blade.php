@extends('admin.admin-new2')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
<div class="container">

    @include('common.errors')
<div id="fields-container">
    {!! Form::open(['route' => 'faqs.store']) !!}
    {!! csrf_field() !!}
        @include('faqs.fields')

    {!! Form::close() !!}
    </div>
</div>
@endsection
