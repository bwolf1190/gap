<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 10]> <html lang="en" class="ie10"> <![endif]-->
<!--[if IE 11]> <html lang="en" class="ie11"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <!-- Meta -->
    
    <meta name="author" content="Brett Wolverton">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.css') !!}

    {!! Html::style('css/admin-new.css') !!}

    <!-- JS -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js', array('defer' => 'defer')) !!}

    <!-- End JS -->
</head>

<body>
    <div class="jumbotron">
            <div clas="row">
                <div class="col-xs-4">
                    <div class="row">
                    </div>                    
                    <div class="row">
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                    </div>
                </div>
                <div class="col-xs-6 col-xs-offset-2">
                    @yield('content')
                </div>
            </div>
    </div>
</body>
</html>