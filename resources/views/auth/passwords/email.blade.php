@extends('auth.index')

@section('site-title')
    Reset Password
@endsection

<!-- Main Content -->
@section('content')
    <div class="panel panel-default text-center paper-shadow">
        <h1 class="text-display-1">Reset Password</h1>
        <div class="panel-body">

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

            <!-- Signup -->
            <form role="form" action="{{ url('/password/email') }}" method="POST">
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

                <div class="form-group">
                    <input type="hidden" name="remember" checked>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
            <!-- //Signup -->

        </div>
    </div>
@endsection
