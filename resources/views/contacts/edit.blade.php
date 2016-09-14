@extends('admin.admin-master')

@section('content')
<div id="contacts-container" class="container">

    @include('common.errors')

    {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch']) !!}
    {!! csrf_field() !!}
    <div id="fields-container">
        @include('contacts.admin-fields')
    </div>
    {!! Form::close() !!}
</div>
@endsection
