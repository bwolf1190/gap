<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
        {!! Html::style('css/master.css') !!}
        {!! Html::style('css/business-frontpage.css') !!}
        {!! Html::script('js/master.js') !!}
        <title>@yield('title') - Great American Power</title>
    </head>
    <body id='body' class='fade-in'>

    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button id='collapse-btn' type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar">
                        <span class="icon-bar"></span></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    @yield('navbar-brand')

                </div>
                <div id='nav-links' class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li id='nav-enroll'>
                            <a href="/enroll-greatamericanpower-sign-up-electricity">Enroll</a>
                        </li>
                       <!-- <li>
                            <a href="#">About</a>
                        </li> -->
                        <li>
                            <a href="/frequently-asked-questions-energy-faq">Faq</a>
                        </li>
                        <li>
                            <a href="/contact-us-customer-service">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <!-- <h1 class="tagline">Great American Power <span id='fcp'>Freedom. Choice. Power</span></h1>-->
                </div>
            </div>
        </div>
    </header>
                <div id='container'>
                    <div class='container'>
                        <div id='carousel' class=''>
                           <!-- <div id="sidebar" class='col-lg-1'>
                                
                                <ul class='list-unstyled'>
                                    <li><a id='' href="..">Home</a></li>
                                    <li><a href="../about-us-greatamericanpower-energy-provider">About</a></li>
                                    <li><a id='sidebar_enroll' href='../enroll-greatamericanpower-sign-up-electricity'>Enroll</a></li>
                                    <li><a href="../frequently-asked-questions-energy-faq">FAQ</a></li>
                                    <li><a href="../contact-us-customer-service">Contact</a></li>
                                </ul>
                                
                            </div> -->
                            <div id="sidebar" class=''>
                                <a href="https://www.facebook.com/Great-American-Power-110065029056937/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="http://www.twitter.com/#!/GreatAmeriPower" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/1855714" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>

                            @yield('carousel')
                        </div>

                    </div>
                    <div id='content' class='container'>
                        @yield('content')
                        @yield('powered-by-gap')
                    </div>
                </div>

                <footer class="footer-distributed">
                    <div id="footer-content" class="row">
                            <div class="footer-left">

                                <!--<h3>Company<span>logo</span></h3>-->
                {!! Html::image('images/great-american-power-fcp.jpg', 'freedom-choice-power-great-american-power', array('class' => 'footer-brand-img')) !!}
                                <p class="footer-links">
                                    <a href="/">Home</a>
                                    ·
                                    <a href="/contact-us-customer-service">Enroll</a>
                                    ·
                                    <a href="#">About</a>
                                    ·
                                    <a href="/frequently-asked-questions-energy-faq">Faq</a>
                                    ·
                                    <a href="/contact-us-customer-service">Contact</a>
                                </p>

                                <p class="footer-company-name">Great American Powers, LLC &copy; 2016</p>
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
                                    Great American Power supplies the same energy you currently receive, often at lower prices, with no interruption in service. So switch today and take control the Great American Power way!
                                </p>

                                <div class="footer-icons">

                                    <a href="https://www.facebook.com/Great-American-Power-110065029056937/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="http://www.twitter.com/#!/GreatAmeriPower" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/company/1855714" target="_blank"><i class="fa fa-linkedin"></i></a>

                                </div>

                            </div>
                        </div>
                        <div id="disclaimer" class="row">
                            <p>PA license number A-2205475 | MD license number IR-2440<br>
                            The rates posted on this Great American Power site are based on present rates.</p>
                        </div>

                        </footer>

            </body>
        </html>