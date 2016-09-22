@extends('master')
@section('page-style')
    {!! Html::style('css/contact-sidebar.css') !!}
    {!! Html::style('css/welcome-2.css') !!}
    {!! Html::style('css/social-sidebar.css') !!}
@endsection
@section('navbar-brand')
    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png', 'great-american-power-freedom-choice-power') !!}</a>
@endsection
@section('content')
    <div class="row">
        <!-- === BEGIN CONTENT === -->
        <div id="content" class="container">
            <div class="row margin-top-30">
                <!-- Carousel Slideshow -->
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <!-- Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!-- End Carousel Indicators -->
                    <!-- Carousel Images -->
                    <div class="carousel-inner">
                        <div class="item active">
                            {!! Html::image('images/house-lights_1060-510.jpg', 'slide1', ['class' => 'fade-in-md']) !!}
                            <div class="carousel-caption fade-in-slow">
                                <h1>Great American Power</h1>
                                <h3 style="color:lightgray;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</h3>
                            </div>
                        </div>
                        <div class="item">
                            {!! Html::image('images/bakery-short-short.jpg', 'slide2', ['class' => 'fade-in-md']) !!}
                            <div class="carousel-caption fade-in-slow">
                                <h1>Great American Power</h1>
                                <h3 style="color:lightgray;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</h3>
                            </div>
                        </div>
                        <div class="item">
                            {!! Html::image('images/house-home-green_1060-510.jpg', 'slide1', ['class' => 'fade-in-md']) !!}
                            <div class="carousel-caption fade-in-slow">
                                <h1>Great American Power</h1>
                                <h3 style="color:lightgray;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <!-- <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>-->
                    <!-- End Carousel Controls -->
                </div>
                <!-- End Carousel Slideshow -->
            </div>
            <div class="row margin-vert-30 animate fadeInUp">
                <!-- Main Text -->
                
                <div id="sign-up-container-sm" class="col-md-4 col-sm-4 animate fadeInUp">
                    <h2 id="sign-up-header" style="">Find Your Rate</h2>
                    {!! Form::open(['action' => 'LdcController@search']) !!}
                    {!! csrf_field() !!}
                    <div id="sign-up-form" class="">
                        <div id="zip" class="form-group">
                            {!! Form::text('zip', 'Zip Code', ['class' => 'form-control']) !!}
                        </div>
                        <div class="row">
                            <div class="form-group" style="margin-left:20px;">
                                <input id="next" type="submit" name="Residential" value="Residential">
                                <input id="next" type="submit" name="Commercial" value="Commercial">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-8 col-sm-7">
                    <h2 style="margin-bottom:20px;">What We Do</h2>
                    <p style="text-indent:5px;">Great American Power is an Electric Supply company focusing on the US states with deregulation. We believe in hiring the right people for the job which in turn means our clients get the best possible services and products. We understand that electricity service is not an option, it is an essential service and is something our clients must therefore pay close attention to manage and control costs, now and in the foreseeable future.</p>
                    <p style="text-indent:5px;">Our staff is Empowered, Educated, and Experienced. When you speak with one, you will remember the experience and it is our goal that you will also know more than you did before the conversation. We also hope that you will stay in touch with us and let us know what else we can do to earn your business!</p>
                </div>
                <!-- End Main Text -->
                <div id="sign-up-container" class="col-md-4 col-sm-4 animate fadeInUp">
                    <h2 id="sign-up-header" style="">Find Your Rate</h2>
                    {!! Form::open(['action' => 'LdcController@search']) !!}
                    {!! csrf_field() !!}
                    <div id="sign-up-form" class="">
                        <div id="zip" class="form-group">
                            {!! Form::text('zip', 'Zip Code', ['class' => 'form-control']) !!}
                        </div>
                        <script type="text/javascript">
                        $("input[name=zip]").click(function(e){
                        $(this).val("");
                        });
                        </script>
                        <div class="row">
                            <div class="form-group" style="margin-left:20px;">
                                <input id="next" type="submit" name="Residential" value="Residential">
                                <input id="next" type="submit" name="Commercial" value="Commercial">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <!-- Portfolio -->
                <!-- Portfolio Item -->
                <div class="portfolio-item col-sm-4 animate fadeInUp">
                    <div class="image-hover">
                            <figure>
                                {!! Html::image('images/enroll-square.png', 'enroll-now', array('class' => 'img-square img-responsive img-center enroll')) !!}
                                <div class="overlay">
                                    <a class="expand" href="/enroll-sign-up-energy-electricity">Image Link</a>
                                </div>
                            </figure>
                            <h3 class="margin-top-20">Enroll Now</h3>
                            <p class="margin-top-10 margin-bottom-20">We are tremendously excited to have the opportunity to become your supplier of choice. In more and more states people have the freedom to choose their own supplier. We have just begun to grow and, with this growth, we will have new and exciting products developed for our client base. We hope to start a relationship with you that begins with electricity service and develops into much more. Go to our Enroll page to get started!</p>
                            <div class="btn btn-default">
                                <a class="info" href="/enroll-sign-up-energy-electricity">Enroll</a>
                            </div>
                    </div>
                </div>
                <!-- //Portfolio Item// -->
                <!-- Portfolio Item -->
                <div class="portfolio-item col-sm-4 animate fadeInUp">
                    <div class="image-hover">
                            <figure>
                                {!! Html::image('images/faq-square.png', 'learn-more', array('class' => 'img-square img-responsive img-center learn')) !!}
                                <div class="overlay">
                                    <a class="expand" href="/faq-frequently-asked-questions-energy-electricity">Image Link</a>
                                </div>
                            </figure>
                            <h3 class="margin-top-20">Learn More</h3>
                            <p class="margin-top-10 margin-bottom-20">Great American Power is approved and licensed by the Pennsylvania Public Utilities Commission and the Maryland Public Service Commission. We currently provide electric service in PPL, PECO, Duke, Duquesne, BGE, Delmarva and PEPCO utility territories.  Want to know more? Check out our Frequently Asked Questions page!</p>
                            <div class="btn btn-default">
                                <a class="info" href="/faq-frequently-asked-questions-energy-electricity">FAQ</a>
                            </div>
                    </div>
                </div>
                <!-- //Portfolio Item// -->
                <!-- Portfolio Item -->
                <div class="portfolio-item col-sm-4 animate fadeInUp">
                    <div class="image-hover">
                            <figure>
                                {!! Html::image('images/contact-square.png', 'contact-us', array('class' => 'img-square img-responsive img-center contact')) !!}
                                <div class="overlay">
                                    <a class="expand" href="/contact-us-customer-service">Image Link</a>
                                </div>
                            </figure>
                            <h3 class="margin-top-20">Contact Us</h3>
                            <p class="margin-top-10 margin-bottom-20">If you have a question about your account, service, or our plans, please do not hesitate to contact us.  Follow this link to our Contact page to find out how to get in touch!</p>
                            <div class="btn btn-default">
                                <a class="info" href="/contact-us-customer-service">Contact</a>
                            </div>
                    </div>
                </div>
                <!-- //Portfolio Item// -->
                <!-- End Portfolio -->
            </div>
            <div class="row">
                <div class="margin-top-30"></div>
                <h1 id="bottom-gap" class="text-center margin-top-30">Great American Power</h1>
                <p class="text-center margin-bottom-10">Switch today and take control the Great American Power way</p>
            </div>
        </div>
    </div>
@endsection