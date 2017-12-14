<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Title -->
    <title>@yield('page-title')</title>
    <!-- Meta -->
    
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
    {!! Html::style('css/master.css?v=2') !!}
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
    <div id="header-container" class="">
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
                        @if(!(isset($type)))
                        <ul class="nav navbar-nav">
                            <li><a href="{{ env('HOME_URL') }}">HOME</a></li>
                            <li><a href="{{ env('ENROLL_URL') }}">ENROLL</a></li>
                            <li><a href="{{ env('FAQ_URL') }}">FAQ</a></li>
                            <li><a href="{{ env('CONTACT_URL') }}">CONTACT</a></li>
                        </ul>
                        @elseif($type == 'web' && $plan->promo != 'GAP')
                        <ul class="nav navbar-nav">
                            <li><a href="{{ env('HOME_URL') }}">HOME</a></li>
                            <li><a href="{{ env('ENROLL_URL') }}">ENROLL</a></li>
                            <li><a href="{{ env('FAQ_URL') }}">FAQ</a></li>
                            <li><a href="{{ env('CONTACT_URL') }}">CONTACT</a></li>
                        </ul>
                        @else
                        @endif
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
                <a href="{{ env('HOME_URL') }}">Home</a>
                ·
                <a href="{{ env('ENROLL_URL') }}">Enroll</a>
                <!--·
                <a href="/about-us">About</a>-->
                ·
                <a href="{{ env('FAQ_URL') }}">Faq</a>
                ·
                <a href="{{ env('CONTACT_URL') }}">Contact</a>
            </p>
            <p class="footer-company-name">Great American Power &copy; 2017</p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>PO Box 1627</span> Kennesaw, GA 30156</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>1-877-215-4140</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:GAPOnline@GreatAmericanPower.com">Email Us</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                Great American Power is approved and licensed by the Pennsylvania Public Utilities Commission and the Maryland Public Service Commission. We currently provide electric service in PPL, PECO, Duquesne, BGE, Delmarva and PEPCO utility territories.
            </p>
            <div class="footer-icons">
                <a href="https://www.facebook.com/GreatAmericanPower/" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/GreatAmeriPower" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/1855714" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="https://www.pinterest.com/grtamerpwr/ " target="_blank"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>
        <div id="disclaimer" class="row">MD license number IR-2440 | OH license number 16-1073E (1) | PA license number A-2205475<br>
        The rates posted on this Great American Power site are based on present rates.<br>
        <a href="{{ env('HISTORICAL_RATES_URL') }}">Historical Rates</a>
        </div>
    </footer>
    <!-- End Footer Menu -->

<!-- Start of StatCounter Code for Default Guide -->  
    <script type="text/javascript"> 
        var sc_project=11344440; var sc_invisible=1; var sc_security="35fa6508"; var scJsHost = (("https:" == document.location.protocol) ?
        "https://secure." : "http://www.");
        document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+ "statcounter.com/counter/counter.js'></"+"script>");
    </script>
    <noscript>
        <div class="statcounter"><a title="web stats"
        href="http://statcounter.com/" target="_blank"><img class="statcounter"
        src="//c.statcounter.com/11344440/0/35fa6508/1/" alt="web stats"></a></div>
    </noscript>
<!-- End of StatCounter Code for Default Guide -->


</body>
@yield('bottom-style')
@yield('bottom-scripts')
</html>