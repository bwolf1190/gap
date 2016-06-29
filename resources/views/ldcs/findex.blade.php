@extends('master')

@section('navbar-brand')

    @if($promo === null)
        <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
    @else
        <a class="navbar-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
    @endif

@endsection


@section('carousel')

<!--
{!! Html::image('images/american-small.png', 'enroll-circle', array('class' => 'img-square img-responsive img-center')) !!}
-->

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
    </div>

@endsection

    @section('powered-by-gap')
        <div class="fade-in">
            @if($promo !== null)
                <div id="powered-by-gap" class="form-group">
                        {!! Html::image('images/powered-by-gap-trans.png', 'footer-brand-img', array('class' => 'img-responsive')) !!}
                </div>   
            @endif
        </div>

    {!! Html::style('css/master.css') !!}
    {!! Html::style('css/welcome.css') !!}
    {!! Html::style('css/enroll.css') !!}
    {!! Html::style('css/broker.css') !!}
    {!! Html::script('js/enroll.js') !!}

    @endsection

