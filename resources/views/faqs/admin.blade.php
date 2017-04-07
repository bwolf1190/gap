@extends('admin.admin-master')

@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')
{!! Html::style('css/admin.css') !!}
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Faqs</h1>
            <a class="btn btn-primary pull-right admin-top-btn" style="margin-top: 25px" href="{!! route('faqs.create') !!}">Add New</a>
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
