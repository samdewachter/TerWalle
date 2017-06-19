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
<div class="login-wrapper">
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
                        <span>De pagina die je probeerde te bezoeken bestaat niet</span>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div>

@endsection
