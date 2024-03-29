<!DOCTYPE html>
<html class="st-layout ls-top-navbar-large ls-bottom-footer show-sidebar sidebar-l3" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('site-title') | {{ env('APP_NAME') }}</title>

    <link href="/assets/css/vendor/all.css" rel="stylesheet">
    <link href="/assets/css/app/app.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('custom-styles')
</head>

<body>

<!-- Wrapper required for sidebar transitions -->
<div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-size-large navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#sidebar-menu" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/home') }}">
                    <div class="navbar-brand navbar-brand-primary navbar-brand-logo navbar-nav-padding-left text-center">
                        Skydemics
                    </div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav navbar-nav-bordered navbar-right">
                    <!-- notifications -->
                    <li class="dropdown notifications updates">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-primary">4</span>
                        </a>
                        <ul class="dropdown-menu" role="notification">
                            <li class="dropdown-header">Notifications</li>
                            <li class="media">
                                <div class="pull-right">
                                    <span class="label label-success">New</span>
                                </div>
                                <div class="media-left">
                                    <img src="/assets/images//people/50/guy-2.jpg" alt="people" class="img-circle" width="30">
                                </div>
                                <div class="media-body">
                                    <a href="#">Adrian D.</a> posted <a href="#">a photo</a> on his timeline.
                                    <br/>
                                    <span class="text-caption text-muted">5 mins ago</span>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-right">
                                    <span class="label label-success">New</span>
                                </div>
                                <div class="media-left">
                                    <img src="/assets/images//people/50/guy-6.jpg" alt="people" class="img-circle" width="30">
                                </div>
                                <div class="media-body">
                                    <a href="#">Bill</a> posted <a href="#">a comment</a> on Adrian's recent <a href="#">post</a>.
                                    <br/>
                                    <span class="text-caption text-muted">3 hrs ago</span>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-left">
                                    <span class="icon-block s30 bg-grey-200"><i class="fa fa-plus"></i></span>
                                </div>
                                <div class="media-body">
                                    <a href="#">Mary D.</a> and <a href="#">Michelle</a> are now friends.
                                    <p>
                                        <span class="text-caption text-muted">1 day ago</span>
                                    </p>
                                    <a href="">
                                        <img class="width-30 img-circle" src="/assets/images//people/50/woman-6.jpg" alt="people">
                                    </a>
                                    <a href="">
                                        <img class="width-30 img-circle" src="/assets/images//people/50/woman-3.jpg" alt="people">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- // END notifications -->
                    <!-- User -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                            <img src="/assets/images//people/110/guy-5.jpg" alt="Bill" class="img-circle" width="40" /> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('account.settings') }}">Account</a></li>
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-3 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
        <div data-scrollable>

            <div class="sidebar-block">
                <div class="profile">
                    <a href="#">
                        <img src="/assets/images//people/110/guy-6.jpg" alt="people" class="img-circle width-80" />
                    </a>
                    <h4 class="text-display-1 margin-none">{{ Auth::user()->name }}</h4>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
                @role('super.admin|admin|lecturer')
                    <li class="text-muted text-center">Lecturer</li>
                    <li><a href="{{ route('courses.builder') }}"><i class="fa fa-plus-square-o"></i><span>Course Builder</span></a></li>
                    <li><a href="{{ route('lecturer.courses') }}"><i class="fa fa-graduation-cap"></i><span>Courses</span></a></li>
                @endrole
                @role('super.admin|admin|student')
                    <li class="text-muted text-center">Student</li>
                    <li><a href="{{ route('student.courses') }}"><i class="fa fa-graduation-cap"></i><span>Courses</span></a></li>
                @endrole
                @role('super.admin|admin')
                    <li class="text-muted text-center">Admin</li>
                    <li class="hasSubmenu">
                        <a href="#admin-menu"><i class="fa fa-file-text-o"></i><span>Admin</span></a>
                        <ul id="admin-menu">
                            <li><a href="{{ route('admin.site.disciplines') }}"><span>Disciplines</span></a></li>
                        </ul>
                    </li>
                @endrole
            </ul>
        </div>
    </div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

        <!-- sidebar effects INSIDE of st-pusher: -->
        <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

        <!-- this is the wrapper for the content -->
        <div class="st-content">

            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner padding-none">

                <div class="container-fluid">

                    <div class="page-section">
                        <h1 class="text-display-1">@yield('page-title')</h1>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error_message'))
                        <div class="alert alert-danger">
                            {{ session('error_message') }}
                        </div>
                    @endif

                    @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif

                    @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    @yield('content')

                </div>

            </div>
            <!-- /st-content-inner -->

        </div>
        <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer">
        <strong>{{ env('APP_NAME') }}</strong> v1.1.0 &copy; Copyright {{ date('Y') }}
    </footer>
    <!-- // Footer -->

</div>
<!-- /st-container -->

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

<script src="/assets/js/helpers.js"></script>
<script src="/assets/js/vendor/all.js"></script>
<script src="/assets/js/app/sidebar.js"></script>
@yield('custom-scripts')
</body>
</html>