@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Contact Requests</h1>
          <!--  <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('contacts.create') !!}">Add New</a> -->
        </div>

        <div class="row">
            @if($contacts->isEmpty())
                <div class="well text-center">No Contact requests found.</div>
            @else
                @include('contacts.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $contacts])


    </div>
@endsection
