<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <!-- Title -->
    <title>Great American Power - Welcome</title>
    <!-- Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.css') !!}
    <!-- Template CSS -->
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/font-awesome.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/admin.css') !!}
    {!! Html::script('js/jquery.min.js', array('defer' => 'defer')) !!}
    {!! Html::script('js/bootstrap.min.js', array('defer' => 'defer')) !!}
    {!! Html::script('js/master.js', array('defer' => 'defer')) !!}
    
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
</head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <a class="navbar-brand" href="/admin">{!! Html::image('images/gap-admin.png') !!}</a>
                <div id="nav-links-container" class="pull-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/admin">Home</a></li>
                        <li id="logout"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout (<span> {!! Auth::user()->name !!} </span>)</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- === END HEADER === -->
        @yield('content')
        <!-- === END CONTENT === -->
    </body>
</html>

</body>
</html>
<!-- === END FOOTER === -->