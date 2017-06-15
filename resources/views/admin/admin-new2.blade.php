<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="ie10"> <![endif]-->
<!--[if IE 11]> <html lang="en" class="ie11"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <!-- Meta -->
    
    <meta name="author" content="Brett Wolverton">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.css') !!}
    <!-- Template CSS -->
    {!! Html::style('css/admin-new.css') !!}
    <!-- JS -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js', array('defer' => 'defer')) !!}
    <!-- End JS -->
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>

<script type="text/javascript">
$(document).ready(function () {
    if(window.location.href.indexOf("admin") > -1) {
       window.location.href = '/plans';
    }
});
</script>

    <div class = "container body">
        <div class="row top-nav">
            <div class="col-xs-5 top-left-nav">
                {!! Html::image('images/gap-fcp-swoosh.jpg') !!}
            </div>
            <div class="col-xs-7 top-right-nav">
                <div class="col-xs-3 col-xs-offset-9">
                    <li id="logout"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout (<span> {!! Auth::user()->name !!} </span>)</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button onclick="window.location.href='/plans';" type="button" class="btn btn-primary">Plans</button>
            </div>
            <div class="btn-group">
                <button onclick="window.location.href='/customers';" type="button" class="btn btn-primary">Customers</button>
            </div>
            <div class="btn-group">
                <button onclick="window.location.href='/faqs';" type="button" class="btn btn-primary">FAQs</button>
            </div>
            <div href="/contacts" class="btn-group">
                <button onclick="window.location.href='/contacts';" type="button" class="btn btn-primary">Messages</button>
            </div>
        </div>
    </div>
    <div class = "row">
        <!-- <div class = "col-xs-2 nav-container">
            <a class="link active" href="/plans">
                <div class = "row tab">
                    <h2>Plans</h2>
                </div>
            </a>
            <a class="link" href="/customers">
                <div class = "row tab">
                    <h2>Customers</h2>
                </div>
            </a>
            <a class="link" href="/faqs">
                <div class = "row tab">
                    <h2>FAQs</h2>
                </div>
            </a>
            <a class="link" href="/contacts">
                <div class = "row tab">
                    <h2>Messages</h2>
                </div>
            </a>
        </div>-->
        <div class = "col-xs-12" id="content-container">
            @yield('content')
        </div>
    </div>
    
</div>
</body>