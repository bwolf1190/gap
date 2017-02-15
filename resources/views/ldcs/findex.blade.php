@extends('master')

@section('page-title', 'Enroll - Great American Power')

@section('page-style')
    {!! Html::style('css/enroll.css') !!}
    {!! Html::style('css/broker.css') !!}
@endsection

@section('navbar-brand')

    @if($promo === null)
        <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
    @else
        <a id="nav-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
    @endif

@endsection

@section('content')

    <div id="enroll_container" class="container">

        <div id="ldc_container" class="row">

                @if(empty($ldcs))
                    <div class="well text-center">No Ldcs found.</div>
                @else
                    @include('ldcs.filtered')
                @endif

        </div>
        @include('emails.select-meter-modal')
    </div>

@endsection

@section('powered-by-gap')

    @if($promo !== null)
        <div id="" class="" style="max-width:400px; margin:0 auto;">
            {!! Html::image('images/powered-by-gap-trans.png', '', array('class' => 'form-group')) !!}
        </div>
    @endif

@endsection

@section('bottom-scripts')
    {!! Html::style('dist/remodal.css') !!}
    {!! Html::style('dist/remodal-default-theme.css') !!}
    {!! Html::script('dist/remodal.js') !!}
    {!! Html::script('js/enroll.js') !!}
    {!! Html::script('js/commercial.js') !!}
@endsection
