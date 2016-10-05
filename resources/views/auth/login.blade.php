<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login - CIL System</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    User Login - CIL System
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style="margin-top: 80px">
            <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                {!! Form::open( array('url' => action('AuthController@postLogin'), 'method' => 'post'), array('role' => 'form') ) !!}
                    <div class="form-group">
                        <label for="login-username">Username</label>
                        {!! Form::text('username', '', array('class' => 'form-control', 'id' => 'login-username')) !!}
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        {!! Form::password('password', array('class' => 'form-control', 'id' => 'login-password')) !!}
                    </div>

                    @if( Session::get('error') )
                    <p class="bg-danger" style="background: red; color: #fff; padding: 4px">
                        Username and Password do not match
                    </p>
                    @endif

                    <button type="submit" class="btn btn-info btn-block">Login</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>