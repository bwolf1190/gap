@extends('master')

{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/broker.css') !!}

@section('navbar-brand')

    @if($promo === null)
        <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
    @else
        <a id="nav-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
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
    @if($promo !== null)
        <div id="" class="" style="max-width:400px; margin:0 auto;">
            {!! Html::image('images/powered-by-gap-trans.png', '', array('class' => 'form-group')) !!}
        </div>
    @endif

 
    {!! Html::script('js/enroll.js') !!}

    @endsection

