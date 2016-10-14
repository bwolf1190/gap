<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <!-- Title -->
    <title>Great American Power - Welcome</title>
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Great American Power is an energy company serving Pennsylvania and Maryland. We currently provide electric service in PPL, PECO, Duke, Duquesne, BGE, Delmarva and PEPCO utility territories.">
    <meta name="author" content="Brett Wolverton">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.css') !!}
    <!-- Template CSS -->
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/font-awesome.css') !!}
    {!! Html::style('css/nexus.css') !!}
    {!! Html::style('css/custom.css') !!}
    {!! Html::style('css/welcome-2.css') !!}
    {!! Html::style('css/master.css') !!}
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    @yield('page-style')
    @yield('top-scripts')
    <!-- JS -->
    {!! Html::script('js/scripts.js', array('defer' => 'defer')) !!}
    <!-- Isotope - Portfolio Sorting -->
    {!! Html::script('js/jquery.isotope.js', array('defer' => 'defer')) !!}
    <!-- Mobile Menu - Slicknav -->
    {!! Html::script('js/jquery.slicknav.js', array('defer' => 'defer')) !!}
    <!-- Animate on Scroll-->
    {!! Html::script('js/jquery.visible.js', array('defer' => 'defer')) !!}
    <!-- Slimbox2-->
    {!! Html::script('js/slimbox2.js', array('defer' => 'defer')) !!}
    <!-- Modernizr -->
    {!! Html::script('js/modernizr.custom.js', array('defer' => 'defer')) !!}
    {!! Html::script('js/master.js', array('defer' => 'defer')) !!}
    <!-- End JS -->
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
    <div id="header-container" class="animate fadeInDown">
        <div id="pre_header" class="visible-lg"></div>
        <div id="header" class="container">
            <div class="row">
                <!-- Logo -->
                <div class="logo">
                    @yield('navbar-brand')
                </div>
                <!-- End Logo -->
                <!-- Top Menu -->
                <div class="col-md-12 margin-top-10">
                    <div id="hornav" class="pull-right visible-lg">
                        <ul class="nav navbar-nav">
                            <li><a href="/">HOME</a></li>
                            <li><a href="enroll-sign-up-energy-electricity">ENROLL</a></li>
                            <!--<li><a href="/about-us">ABOUT</a></li>-->
                            <li><a href="faq-frequently-asked-questions-energy-electricity">FAQ</a></li>
                            <li><a href="contact-us-customer-service">CONTACT</a></li>
                        </ul>
                    </div>
                </div>

                <!-- End Top Menu -->
            </div>
        </div>
    </div>
    <!-- === END HEADER === -->
    @include('social-sidebar')
    @yield('content')
    @yield('powered-by-gap')
    <!-- === END CONTENT === -->
    <!-- === BEGIN FOOTER === -->
    <footer id="footer-container" class="footer-distributed animate fadeInUp">
        <div class="footer-left">
            <!--<h3>Company<span>logo</span></h3>-->
            {!! Html::image('images/great-american-power-fcp.jpg', 'footer-brand-img', array('class' => 'footer-brand-img')) !!}
            <p class="footer-links">
                <a href="/">Home</a>
                ·
                <a href="enroll-sign-up-energy-electricity">Enroll</a>
                <!--·
                <a href="/about-us">About</a>-->
                ·
                <a href="frequently-asked-questions-energy-electricity">Faq</a>
                ·
                <a href="contact-us-customer-service">Contact</a>
            </p>
            <p class="footer-company-name">Great American Power &copy; 2016</p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>2959 Cherokee St NW</span> Kennesaw, GA</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>1-877-215-4140</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:service@greatamericanpower.com">Email Us</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                Great American Power is approved and licensed by the Pennsylvania Public Utilities Commission and the Maryland Public Service Commission. We currently provide electric service in PPL, PECO, Duquesne, BGE, Delmarva and PEPCO utility territories.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>
        <div id="disclaimer" class="row">PA license number A-2205475 | MD license number IR-2440 <br>
        The rates posted on this Great American Power site are based on present rates.</div>
    </footer>
    <!-- End Footer Menu -->
</body>
@yield('bottom-style')
@yield('bottom-scripts')
</html>