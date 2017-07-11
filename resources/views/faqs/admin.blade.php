@extends('admin.admin-new2')

@section('content')
    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">FAQs</h1>
            <a class="btn btn-primary pull-right add-btn" href="{!! route('faqs.create') !!}">Add New</a>
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
