@extends('layouts.app')

@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/homepageStyle.css') }}">
@endsection
<div class="home-header">
    <div class="background jumbotron" style="background-image: linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url('images/{{ $settings->cover_photo }}')">
        <h1>Jeugdhuis Ter Walle</h1>
    </div>
</div>
<div class="home-body">
    <div class="container">
        <div class="row">
            @if(count($news) != 0)
                <div class="col-lg-12 news-item">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="news-text">
                                <h2>{{ $news->title }}</h2>
                                <p>{{ $news->subtitle }}</p>
                                <div class="read-more">
                                    <a href="{{ url('/nieuws', [$news->id]) }}">Lees meer</a>
                                </div>
                            </div>

                        </div>
                        <div class="panel-body" style="background-image:  url('{{ url('/uploads/newsPhotos', [$news->cover_photo]) }}')">
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2>Nieuwsberichten</h2>
                            </div>
                            <div class="panel-body">
                                <p>Er zijn nog geen nieuwsberichten aangemaakt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-6 col-md-6 col-sm-12 event-item">
                    <div class="panel">
                        <?php $cover = substr($event->cover, 0, 4); ?>
                        @if($cover == 'http')
                            <div class="panel-heading" style="background-image: url('{{ $event->cover }}')"></div>
                        @else
                            <div class="panel-heading" style="background-image: url('{{ url('/uploads/eventPhotos', [$event->cover]) }}')"></div>
                        @endif
                        <div class="panel-body">
                            <div class="panel-body-heading">
                                <h3>{{ $event->title }}</h3>
                                <span>{{ $event->start_time }}</span>
                            </div>
                            <p>
                                @if( strlen($event->description) > 200)
                                    {{ substr($event->description, 0, 200) . '...' }}
                                @else
                                    {{ $event->description }}
                                @endif
                            </p>
                            <div class="read-more">
                                <a href="{{ url('/evenementen', [$event->id]) }}">Bekijk evenement</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="subscribe-wrapper">
        <div class="subscribe">
            @if(Auth::check())
                <h2>Welkom {{ Auth::user()->first_name }}!</h2>
            @else
                <h2>Word nu lid van Ter Walle!</h2>
                <p>Maak kans op tickets en gratis bonnetjes!</p>
                <a class="member-btn" href="{{ url('register') }}">Word lid</a>
            @endif
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript" src="{{ asset('/js/homeScript.js') }}"></script>
@endsection
@endsection
