@extends('master')

@section('page-title', 'Plans - Great American Power')

@section('navbar-brand')
    {!! Html::style('css/broker.css') !!}
    {!! Html::style('css/enroll.css') !!} 
    {!! Html::script('js/enroll.js') !!}   
   
    @if($promo === null)
        <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>
    @else
        <a id="nav-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
    @endif

@endsection


@section('content')
    <div id="enroll_container" class="filtered-table-container container">
        <div class="row">
            <div  class=''>

                @if(empty($plans))
                    <div class="well text-center">No Ldcs found.</div>
                @else
                    @include('plans.filtered')
                @endif

            </div>
        </div>
    </div>
    
@endsection

    @section('powered-by-gap')
    @if($promo !== null)
        <div id="" class="" style="max-width:400px; margin:0 auto;">
            {!! Html::image('images/powered-by-gap-trans.png', '', array('class' => 'form-group')) !!}
        </div>
    @endif

  

    @endsection


