@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/loginRegisterStyle.css') }}">
@endsection
<div class="login-logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('/images/TW_logo.png') }}">
        <span>Ter Walle</span>
    </a>        
</div>
<div class="register-wrapper clearfix">
    <div class="register">
        <div class="welcome-text">
            Welkom!
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                TER WALLE
            </div>
            <div class="panel-body">
                <div class="body-header">
                    <div class="body-title">
                        <div class="login-divider">
                            <span>Registreren</span>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <input type="text" name="first_name" class="form-control input-label-float <?= ($errors->has('first_name'))? 'input-error' : ''; ?>" value="{{ old('first_name') }}">
                        <label class="label-float">Voornaam</label>
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <input type="text" name="last_name" class="form-control input-label-float <?= ($errors->has('last_name'))? 'input-error' : ''; ?>" value="{{ old('last_name') }}">
                        <label class="label-float">Achternaam</label>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" class="form-control input-label-float <?= ($errors->has('email'))? 'input-error' : ''; ?>" value="{{ old('email') }}">
                        <label class="label-float">Email</label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('birth_year') ? ' has-error' : '' }}">
                        <input type="date" name="birth_year" class="form-control input-label-float <?= ($errors->has('birth_year'))? 'input-error' : ''; ?>" value="{{ old('birth_year') }}">
                        <label class="label-float label-float-date">Geboortedatum</label>
                        @if ($errors->has('birth_year'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birth_year') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('profile_photo') ? ' has-error' : '' }}">
                        <label>Profiel foto</label>
                        <input type="file" name="profile_photo" class="form-control <?= ($errors->has('profile_photo'))? 'input-error' : ''; ?>">
                        @if ($errors->has('profile_photo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profile_photo') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="form-control input-label-float <?= ($errors->has('password'))? 'input-error' : ''; ?>">
                        <label class="label-float">Paswoord</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-label-float" name="password_confirmation">
                        <label class="label-float">Bevestig paswoord</label>
                    </div>
                    <button type="submit" class="btn-custom btn-custom-primary pull-right">REGISTREER</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
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
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
