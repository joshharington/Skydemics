@extends('auth.index')

@section('site-title')
    Register
@endsection

@section('content')
    <div class="panel panel-default text-center paper-shadow">
        <h1 class="text-display-1">Create account</h1>
        <div class="panel-body">

            <!-- Signup -->
            <form role="form" action="{{ url('/register') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <br />
                    </div>
                </div>
                <br />
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <br />
                    </div>

                </div>
                <br />
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <br />
                    </div>
                </div>
                <br />
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                        <br />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group text-center">
                    <div class="checkbox">
                        <input type="checkbox" id="agree" />
                        <label for="agree">* I Agree with <a href="#">Terms &amp; Conditions!</a></label>
                        <br />
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        Create an Account
                    </button>
                </div>
            </form>
            <!-- //Signup -->

        </div>
    </div>
@endsection
