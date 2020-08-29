<!doctype html>
<html lang="nl" xml:lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The oldest pub in Hasselt, Belgium. ET 17th century">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Rich Results -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Cafe",
            "image": [],
            "@id": "https://indekleinehal.be",
            "name": "In De Kleine Hal",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Maastrichterstraat 30",
                "addressLocality": "Hasselt",
                "postalCode": "3500",
                "addressCountry": "BE"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 50.929570,
                "longitude": 5.339220
            },
            "url": "https://indekleinehal.be",
            "telephone": "+3211229617",
            "priceRange": "$$",
            "openingHoursSpecification": [{
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday"
                    ],
                    "opens": "09:00",
                    "closes": "21:00"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Friday",
                        "Saturday"
                    ],
                    "opens": "09:00",
                    "closes": "01:00"
                },
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": "Sunday",
                    "opens": "11:00",
                    "closes": "21:00"
                }
            ],
            "menu": "http://www.indekleinehal.be/menu"
        }
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/InDeKleineHalLogo.png') }}" width="40" height="50" alt="">
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-center text-dark" href="{{ route('covid19Registration') }}">✏️ Registratie Covid-19</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-dark" href="{{ route('menu') }}">🍺 Menu</a>
                        </li>
                        @if(Auth::check())
                        <li class="nav-item">
                            <a type="button" class="btn btn-primary btn-block" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a type="button" class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endif
                        <!-- <li class="nav-item d-flex flex-column">
                            <a class="text-center text-dark" href="{{ route('menu') }}">🇬🇧</a>
                            <a class="text-center text-dark" href="{{ route('menu') }}">🇧🇪</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>