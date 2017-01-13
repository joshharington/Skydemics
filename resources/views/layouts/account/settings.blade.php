@extends('index')

@section('site-title')
    Account Settings
@endsection

@section('page-title')
    Account Settings
@endsection

@section('content')
    <!-- Panes -->
    <div class="tab-content">

        <div id="account" class="tab-pane active">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-md-6">
                        <div class="media v-middle">
                            <div class="media-left">
                                <div class="icon-block width-100 bg-grey-100">
                                    <i class="fa fa-photo text-light"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <button type="button" class="btn btn-white btn-sm paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Add Image<i class="fa fa-upl"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Full Name</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-control-material">
                                    <input type="text" class="form-control" id="exampleInputFirstName" name="name" placeholder="Your name" value="{{ (old('name')) ? old('name') : $user->name }}">
                                    @if($user->name == '')
                                        <label for="exampleInputFirstName">Name</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Email</label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $user->email }}" name="email">
                                @if($user->name == '')
                                    <label for="inputEmail3">Email address</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-2 control-label">New Password</label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                            <label for="inputPassword3">Password</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-md-2 control-label">Confirm New Password</label>
                    <div class="col-md-6">
                        <div class="form-control-material">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password" name="password_confirmation">
                            <label for="inputPassword3">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Save Changes</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- // END Panes -->

@endsection