@extends('master')

@section('navbar-brand')

    {!! Html::style('css/faq.css') !!}
    {!! Html::style('css/contact-sidebar.css') !!}

    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
@endsection

@section('content')

    <div id="faq-container" class="container animate fadeInLeft">

        <div class="row">
            <h1 class="pull-left faq-title">Frequently Asked Questions</h1>
        </div>

        <div class="row">
            @if($faqs->isEmpty())
                <div class="well text-center">No Faqs found.</div>
            @else
                <div class="col-md-9">
                    <div class="panel-group" id="accordion">

                        @include('faqs.table')

                    </div>
                </div>
            @endif
            <div class="col-md-3 animate fadeInLeft">
                @include('right-contact-panel')   
            </div>
        </div>

        @include('common.paginate', ['records' => $faqs])
    </div>

@endsection


