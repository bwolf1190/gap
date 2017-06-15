@extends('admin.admin-new2')

@section('content')

<div class="container">

    @include('common.errors')

    {!! Form::model($faq, ['route' => ['faqs.update', $faq->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('faqs.fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
