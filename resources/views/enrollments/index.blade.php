@extends('admin.admin-master')

@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Enrollments</h1>

            <div id="resend-emails" >
            {!! Form::open(['route' => 'resendEmails']) !!}
                {!! csrf_field() !!}
                {!! Form::submit('Resend Emails', ['class' => 'btn btn-primary pull-right col-xs-2 col-xs-offset-1 admin-top-btn'])!!}
        </div>

        </div>

        <div class="row">
            @if($enrollments->isEmpty())
                <div class="well text-center">No Enrollments found.</div>
            @else
                @include('enrollments.table')
            @endif
        </div>

        {!! Form::close() !!}

        @include('common.paginate', ['records' => $enrollments])

    </div>
@endsection
