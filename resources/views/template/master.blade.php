<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - CIL System</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">
                    CIL System
                </a>
            </div>

            <div class="navbar-collapse collapse navbar-right" id="navbar-items">
                <ul class="nav navbar-nav">

                    <li class="visible-xs{!! strpos(Route::current()->getName(), 'home') !== FALSE ? ' active' : '' !!}">
                        <a href="{{ action('HomeController@index') }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ action('AuthController@logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li{!! strpos(Route::current()->getName(), 'home') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('HomeController@index') }}">Home</a>
                    </li>
                </ul>


                <ul class="nav nav-sidebar">
                    <li{!! strpos(Route::current()->getName(), 'client.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('ClientController@index') }}">Clients</a>
                    </li>

                    <li{!! strpos(Route::current()->getName(), 'policy.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('PolicyController@index') }}">Policies</a>
                    </li>
                </ul>
                
                <ul class="nav nav-sidebar">
                    <li{!! strpos(Route::current()->getName(), 'provider.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('ProviderController@index') }}">Providers</a>
                    </li>

                    <li{!! strpos(Route::current()->getName(), 'plan_category.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('PlanCategoryController@index') }}">Plan Categories</a>
                    </li>

                    <li{!! strpos(Route::current()->getName(), 'plan.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('PlanController@index') }}">Plans</a>
                    </li>
                </ul>

                <ul class="nav nav-sidebar">
                    <li{!! strpos(Route::current()->getName(), 'band.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('BandController@index') }}">Bands</a>
                    </li>

                    <li{!! strpos(Route::current()->getName(), 'consultant.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('ConsultantController@index') }}">Consultants</a>
                    </li>

                    <li{!! strpos(Route::current()->getName(), 'split.') !== FALSE ? ' class="active"' : '' !!}>
                        <a href="{{ action('SplitController@index') }}">Splits</a>
                    </li>
                </ul>

            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="page-header">
                    <div class="row">
                        <div class="col-sm-8">
                            @yield('pagetitle', 'Title')
                        </div>

                        <div class="col-sm-4 text-right">
                            @yield('pagetitleright', '')
                        </div>
                    </div>
                </h2>

                @yield('body')

            </div>
        </div>
    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('js')

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/picker.js') }}"></script>
    <script src="{{ asset('js/picker.date.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.date.css') }}">

    <script>
    $(function() {
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd'
        });
    });
    </script>

</body>
</html>