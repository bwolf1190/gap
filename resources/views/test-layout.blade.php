<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <!-- Title -->
    <title>Great American Power</title>
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- Favicon -->
    <link href="favicon.html" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/test-layout.css') !!}
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div id="s1" class="row">
        </div>
        <div id="header-container" class="row">
            <div id="header-left" class="col-xs-4">
                <div class="img img-responsive">
                {!! Html::image('images/gap-fcp.png', 'great-american-power-freedom-choice-power') !!}
            </div>
            </div>
            <div id="header-center" class="col-xs-4">
            </div>
            <div id="header-right" class="col-xs-4">
            </div>
            </div>
            <div id="s2" class="row">
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
                            {!! Html::image('images/house-lights-short.jpg', 'slide1') !!}
                            <div class="carousel-caption">
                                <h1>Slide 1</h1>
                            </div>
                        </div>
                        <div class="item">
                            {!! Html::image('images/office-short----short.jpg', 'slide2') !!}
                            <div class="carousel-caption">
                                <h1>Slide 2</h1>
                            </div>
                        </div>
                        <div class="item">
                            {!! Html::image('images/bakery-short-short.jpg', 'slide1') !!}
                            <div class="carousel-caption">
                                <h1>Slide 3</h1>
                            </div>
                        </div>
                    </div>
                    <!-- End Carousel Images -->
                    <!-- Carousel Controls -->
                    <!-- <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>-->
                    <!-- End Carousel Controls -->
                </div>
            </div>
            <div id="s3" class="row">
            </div>
            <div id="s4" class="row">
            </div>
            <div id="s5" class="row">
            </div>
        </div>
        
        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
    </body>
</html>