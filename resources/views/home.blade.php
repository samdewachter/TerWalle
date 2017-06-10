@extends('layouts.app')

@section('content')
<div class="home-header">
    <div class="background jumbotron" style="background-image: linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url('images/background.jpg')">
        <h1>Jeugdhuis Ter Walle</h1>
    </div>
</div>
<div class="home-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 news-item">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="news-text">
                            <h2>Nieuw Bier!</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <div class="read-more">
                                <span class="pull-right"><a href="">Lees meer >></a></span>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body" style="background-image: url('images/NewsPhotoCover.png')">
                        <!-- <div class="news-item-photo">
                            <img src="{{ asset('/images/NewsPhotoCover.png') }}">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 event-item">
                <div class="panel">
                    <div class="panel-heading" style="background-image: url('images/event1.jpg')">
                        <!-- <img src="{{ asset('/images/event1.jpg') }}"> -->
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <div class="read-event">
                            <span class="pull-right"><a href="">Bekijk evenement >></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 event-item">
                <div class="panel">
                    <div class="panel-heading" style="background-image: url('images/event2.png')">
                        <!-- <img src="{{ asset('/images/event2.png') }}"> -->
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <div class="read-event">
                            <span class="pull-right"><a href="">Bekijk evenement >></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe-wrapper">
        <div class="subscribe">
            <h2>Schrijf je in op onze nieuwsbrief</h2>
            <p>Maak kans op tickets en gratis bonnetjes!</p>
            <form>
                <div class="form-group clearfix">
                    <input placeholder="Email adres" class="col-md-8" type="text" name="email">
                    <button class="col-md-3 col-md-offset-1">Schrijf in</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
