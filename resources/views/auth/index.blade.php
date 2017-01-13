<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('site-title') | {{ env('APP_NAME') }}</title>

    <link href="/assets/css/vendor/all.css" rel="stylesheet">
    <link href="/assets/css/app/app.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
  WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login">

<div id="content">

    <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav">
                <div class="navbar-right">
                    <a href="{{ url('/login') }}" class="navbar-btn btn btn-primary text-white">Log In</a>
                    <a href="{{ url('/register') }}" class="navbar-btn btn btn-primary">Register</a>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>

    <div class="row">
        <br /><br />
        <br /><br />
        <br /><br />
        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <strong>{{ env('APP_NAME') }}</strong> v1.1.0 &copy; Copyright {{ date('Y') }}
</footer>
<!-- // Footer -->
<!-- Inline Script for colors and config objects; used by various external scripts; -->
<script>
    var colors = {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
    };
    var config = {
        theme: "html",
        skins: {
            "default": {
                "primary-color": "#42a5f5"
            }
        }
    };
</script>



</body>

</html>