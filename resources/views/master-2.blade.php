<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
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
    <!-- Template CSS -->
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/font-awesome.css') !!}
    {!! Html::style('css/nexus.css') !!}
    {!! Html::style('css/responsive.css') !!}
    {!! Html::style('css/custom.css') !!}
    {!! Html::style('css/master.css') !!}
    {!! Html::style('css/welcome.css') !!}
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div id="" class="container">
            <div id="pre-header" class="col-xs-12">
                <button id='collapse-btn' type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar">
                    <span class="icon-bar"></span></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li id=''>
                            <a href="/enroll-greatamericanpower-sign-up-electricity">Enroll</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="/frequently-asked-questions-energy-faq">Faq</a>
                        </li>
                        <li>
                            <a href="/contact-us-customer-service">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-header">
                    
                    @yield('navbar-brand')
                </div>
            </div>
        </nav>
        <div id="content-container">
            @yield('content')
        </div>
        <!-- === BEGIN FOOTER === -->
        <div id="base">
            <div class="container padding-vert-30">
                <div class="row">
                    <!-- Thumbs Gallery -->
                    <div class="col-md-3 margin-bottom-20">
                        <div class="thumbs-gallery">
                            
                            <a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image1.jpg">
                                {!! Html::image('images/great-american-power-fcp.jpg', 'freedom-choice-power-great-american-power', array('class' => 'footer-brand-img')) !!}
                            <i></i></a>
                            
                            </div>          <div class="clearfix"></div>
                        </div>
                        <!-- End Thumbs Gallery -->
                        <!-- Contact Details -->
                        <div class="col-md-3 margin-bottom-20">
                            <h3 class="margin-bottom-10">Contact Details</h3>
                            <p>2959 Cherokee St NW<br />
                                Kennesaw, GA<br />
                                <p>Email: <a href="mailto:service@greatamericanpower.com">service@greatamericanpower.com</a><br />
                            Phone: 1-877-215-4140</p>
                        </div>
                        <!-- End Contact Details -->
                        <!-- Sample Menu -->
                        <div class="col-md-3 margin-bottom-20" >
                            <h3 class="margin-bottom-10">Links</h3>
                            <ul class="menu">
                                <li>
                                    <a class="fa-tasks" href="#" >Enroll</a>
                                </li>
                                <li>
                                    <a class="fa-users" href="#" >About</a>
                                </li>
                                <li>
                                    <a class="fa-signal" href="#" >FAQ</a>
                                </li>
                                <li>
                                    <a class="fa-coffee" href="#">Contact</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            
                        </div>
                        <!-- End Sample Menu -->
                        <!-- Disclaimer -->
                        <div class="col-md-3 margin-bottom-20">
                            <h3 class="margin-bottom-10">Great American Power</h3>
                            <p>Great American Power supplies the same energy you currently receive, often at lower prices, with no interruption in service. So switch today and take control the Great American Power way!
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End Disclaimer -->
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Footer Menu -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div id="copyright" class="col-md-4">
                            <p>(c) 2014 Your Copyright Info</p>
                        </div>
                        <div id="footermenu" class="col-md-8">
                            <ul class="list-unstyled list-inline pull-right">
                                <li>
                                    <a href="#" target="_blank" >Enroll</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" >About</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" >FAQ</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" >Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Menu -->
    </div>
</div>
<!-- JS -->
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/scripts.js') !!}
<!-- Isotope - Portfolio Sorting -->
{!! Html::script('js/jquery.isotope.js') !!}
<!-- Mobile Menu - Slicknav -->
{!! Html::script('js/jquery.slicknav.js') !!}
<!-- Animate on Scroll-->
{!! Html::script('js/jquery.visible.js') !!}
<!-- Slimbox2-->
{!! Html::script('js/slimbox2.js') !!}
<!-- Modernizr -->
{!! Html::script('js/modernizr.custom.js') !!}
<!-- End JS -->
</body>
</html>

