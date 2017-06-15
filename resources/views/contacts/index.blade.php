@extends('admin.admin-new2')

@section('content')

    <div id="contacts-container" class="container animate">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Messages</h1>
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
