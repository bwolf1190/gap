@extends('master')

@section('navbar-brand')

    @if($promo === null)
        <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>
    @else
        <a class="navbar-brand" href="/"> {!! Html::image('images/broker/' . $promo . '.jpg') !!}</a>
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
        <div class="fade-in">
            @if($promo !== null)
                <div id="powered-by-gap" class="form-group">
                        {!! Html::image('images/powered-by-gap-trans.png', 'footer-brand-img', array('class' => 'img-responsive')) !!}
                </div>   
            @endif
        </div>

        {!! Html::style('css/welcome.css') !!}
        {!! Html::style('css/enroll.css') !!}
        {!! Html::style('css/broker.css') !!}
        {!! Html::script('js/enroll.js') !!}

    @endsection


