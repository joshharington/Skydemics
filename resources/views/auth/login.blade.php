@extends('auth.index')

@section('site-title')
    Login
@endsection

@section('content')
    <div class="panel panel-default text-center paper-shadow">
        <h1 class="text-display-1">Login</h1>
        <div class="panel-body">

            <!-- Signup -->
            <form role="form" action="{{ url('/login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <br />
                </div>

                <br />
                <div class="clearfix"></div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br />
                </div>

                <br />
                <div class="clearfix"></div>

                <div class="form-group">
                    <input type="hidden" name="remember" checked>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
            <!-- //Signup -->

        </div>
    </div>
@endsection
