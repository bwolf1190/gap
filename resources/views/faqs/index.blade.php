@extends('master')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@endsection

@section('content')

    <div class="container">

        <div class="row">
            <h1 class="pull-left faq-title">Frequently Asked Questions</h1>
        </div>

        <div class="row">
            @if($faqs->isEmpty())
                <div class="well text-center">No Faqs found.</div>
            @else

                <div class="panel-group" id="accordion">

                    @include('faqs.table')

                </div>
            @endif
        </div>

        @include('common.paginate', ['records' => $faqs])
    </div>

    {!! Html::style('css/master.css') !!}
    {!! Html::style('css/faq.css') !!}

@endsection


