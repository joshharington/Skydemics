<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <link href="/assets/css/vendor/all.css" rel="stylesheet">
        <link href="/assets/css/app/app.css" rel="stylesheet">
    </head>
    <body>
        @if (Route::has('login'))
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
        @endif

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Skydemics <small></small>
                </div>

                <div class="links">
                    By EON Consulting
                </div>
            </div>
        </div>

        <script src="/assets/js/vendor/all.js"></script>
        <script src="/assets/js/app/app.js"></script>
    </body>
</html>
