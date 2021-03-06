@extends('master')

{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/broker.css') !!}

@section('navbar-brand')

@if($promo === null)
<a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
@else
<a id="nav-brand" onclick="location.reload();"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
@endif

@endsection

@section('content')

    <div id="enroll_container" class="container">

        <div id="ldc_container" class="row">

                @if(empty($ldcs))
                    <div class="well text-center">No Ldcs found.</div>
                @else
                    @include('internal.enrollments.ldcs-filtered')
                @endif

        </div>
    </div>

    {!! Html::script('js/enroll.js') !!}

@endsection


