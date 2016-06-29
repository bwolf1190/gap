@extends('master')
@section('title', 'Welcome')

@section('navbar-brand')
    <a class="navbar-brand" href="/"> {!! Html::image('images/gap-fcp.png', 'great-american-power-freedom-choice-power') !!}</a>
@endsection


@section('carousel')
    {!! Html::image('images/american-small.png', 'great-american-power', array('class' => 'img-square img-responsive img-center')) !!}
@endsection

@section('content')

        <div id='enroll_container' class="container col-xs-10 col-xs-offset-1">
           <div id='sign-up-now' class='row'>   {!! $su !!} {!! $aws !!}  </div>
            {!! Form::open(['action' => 'LdcController@search']) !!}
            {!! csrf_field() !!}
            <div id="sign-up-form" class="col-xs-8 col-sm-5 col-md-5">
                <div id="zip" class="form-group row">
                     {!! Form::label('zip', 'Zip Code:') !!}
                    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-xs-5 col-sm-5">
                     {!! Form::label('service', 'Residential') !!}
                    {!! Form::radio('service','Residential', true) !!}
                </div>
                <div class="form-group col-xs-5 col-xs-offset-2 col-sm-5 col-sm-offset-2">
                     {!! Form::label('service', 'Commercial') !!}
                    {!! Form::radio('service','Commmercial') !!}
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6">
                        {!! Form::submit('NEXT', ['class' => 'btn btn-default', 'id' => 'next']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            <div id='service-area-map' class='col-xs-1 col-sm-1 col-md-offset-1'>{!! Html::image('images/service-area-map.png', 'service-area-map') !!}</div>

        </div>
        
        <hr>
        <div class="container col-xs-11 col-xs-offset-1">

        <div id='middle-section' class="row">
            <div id='wwd' class="col-sm-8">
                {!! (microtime(true) - LARAVEL_START) !!}
                {!! $wwd !!}
            </div>
            <div style='margin-top:25px;' id='social' class="col-sm-4">
                <div class='social'>
                    <a href="https://www.facebook.com/Great-American-Power-110065029056937/" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="http://www.twitter.com/#!/GreatAmeriPower" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/1855714" target="_blank"><i class="fa fa-linkedin"></i></a>

                    <address>
                        <abbr title="Phone">P:</abbr>{!! $p !!}
                        <br>
                        <abbr title="Email">E:</abbr> <a href="mailto:#">{!! $e !!}</a>
                    </address>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="BeforeScroll">
        <div id='square-container' >
            <div class="col-sm-4"><a href='#'>
                <a href="/enroll-greatamericanpower-sign-up-electricity"> {!! Html::image('images/enroll-square.png', 'enroll-now', array('class' => 'img-square img-responsive img-center enroll')) !!} </a>
            </a>
               {!! $en !!}
            </div>
            <div class="col-sm-4">
                <a href="/frequently-asked-questions-energy-faq"> {!! Html::image('images/learn-square.png', 'learn-more', array('class' => 'img-square img-responsive img-center learn')) !!} </a>
                {!! $lm !!}
            </div>
            <div class="col-sm-4">
                <a href="/contact-us-customer-service"> {!! Html::image('images/contact-square.png', 'contact-us', array('class' => 'img-square img-responsive img-center contact')) !!} </a>
               {!! $cs !!}
            </div>
    </div>
    </div>

        <hr>
        
    {!! Html::style('css/welcome.css') !!}
    {!! Html::script('js/welcome.js') !!}

    <script type="text/javascript">
        $('.img-square.img-responsive.img-center.enroll').on('mouseenter', function() {
            $(this).attr('src', '{!! url("images/enroll-square-hover.png") !!}');
            //$(this).css('height', '110%');
        });
        $('.img-square.img-responsive.img-center.enroll').on('mouseleave', function() {
            $(this).attr('src', '{!! url("images/enroll-square.png") !!}');
        });

        $('.img-square.img-responsive.img-center.learn').on('mouseenter', function() {
            $(this).attr('src', '{!! url("images/learn-square-hover.png") !!}');
        });
        $('.img-square.img-responsive.img-center.learn').on('mouseleave', function() {
            $(this).attr('src', '{!! url("images/learn-square.png") !!}');
        });

        $('.img-square.img-responsive.img-center.contact').on('mouseenter', function() {
            $(this).attr('src', '{!! url("images/contact-square-hover.png") !!}');
        });
        $('.img-square.img-responsive.img-center.contact').on('mouseleave', function() {
            $(this).attr('src', '{!! url("images/contact-square.png") !!}');
        });
    </script>


@endsection