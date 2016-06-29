@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Faqs</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('faqs.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($faqs->isEmpty())
                <div class="well text-center">No Faqs found.</div>
            @else
                @include('faqs.table-admin')
            @endif
        </div>

        @include('common.paginate', ['records' => $faqs])


    </div>
@endsection
