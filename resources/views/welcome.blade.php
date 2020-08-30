@extends('layouts.app')
<style>
    body,
    html {
        height: 100%;
    }

    .blur {
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }

    .bgimg-1 {
        background-image: url("{{ asset('img/Welcome.InDeKleineHal.webp') }}");
        min-height: 100vh;
        max-width: 100vw;
    }

    .bgimg-2 {
        background-image: url("{{ asset('img/OldPicture2.InDeKleineHal.jpg') }}");
        height: 70vh;
        max-width: 100vw;
    }

    .bgimg-3 {
        background-image: url("{{ asset('img/Welcome2.InDeKleineHal.webp') }}");
        height: 100vh;
        max-width: 100vw;
        background-position: left;
    }

    .bgimg-Divider {
        position: relative;
        z-index: 100;
    }

    .bgimg-1,
    .bgimg-2,
    .bgimg-3 {
        position: relative;

        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .beer-logo {
        display: block;
        position: absolute;
        overflow: visible;
        white-space: nowrap;
        /* animation: moveImage 25s linear infinite;
        opacity: 0.2;
        transform: translate3d(0, 0, 0); */
    }

    @keyframes moveImage {
        0% {
            left: 0;
        }

        100% {
            left: -200%;
        }
    }

    /* Google Maps */
    .mapouter {
        position: relative;
        text-align: right;
    }

    .gmap_canvas {
        overflow: hidden;
        background: none !important;
    }
</style>

@section('content')
<div class="parallax"></div>

<div class="bgimg-1">
    <div class="col-sm-12 d-flex align-items-center justify-content-center blur">
        <img class="align-self-center" src="{{ asset('img/InDeKleineHalWhiteLogo.png') }}" width="176" height="247">
    </div>
</div>

<div class="card shadow-lg bg-light bgimg-Divider">
    <div class="card-body my-3">
        <h3 class="card-title text-center">The oldest pub in Hasselt</h3>
        <h6 class="card-subtitle mb-2 text-muted text-center">Since 1836</h6>
    </div>
</div>

<div class="bgimg-2">
</div>

<!-- MENU  -->
<div class="position-relative shadow-lg bg-light py-4 bgimg-Divider">
    <div class="container px-0 mx-0">
        <div class="row" style="width: max-content; left: 100%; position: absolute;">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Duvel_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Karmeliet_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Kwak_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/LaChouffe_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Leffe_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/StellaArtois_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Omer_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Chimay_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/LaTrappe_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/CuveeDesTrolls_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Orval_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Carlsberg_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/LeFort_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/CocaCola_Logo.webp') }}">
            <img class="col-auto beer-logo" src="{{ asset('img/Beer_Logos/Lipton_Logo.webp') }}">
        </div>
    </div>
    <div class="card align-items-center border-0 bg-transparent">
        <div class="card-body">
            <h3 class="card-title text-center">Our drinks</h3>
            <h6 class="card-text text-center">We have a great variety of alcholic and non-alcholoic drinks</h6>
            <a class="btn btn-primary btn-lg text-center btn-block" href="{{ route('menu') }}">🍺 Check out our Menu 🍺</a>
        </div>
    </div>
</div>

<div class="bgimg-3 d-flex align-items-center">
    <div class="card col-md-5 ml-auto shadow-lg bg-light bgimg-Divider">
        <div class="card-body my-3">
            <h3 class="card-title text-center">Contact Us</h3>
            <a href="https://www.facebook.com/cafeindekleinehal/" class="btn btn-outline-primary btn-lg btn-block">
                Messenger
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
            </a>
            <a href="tel:+3211229617" class="btn btn-outline-secondary btn-lg btn-block">
                Call us at +32 11 229 617
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                </svg>
            </a>
        </div>
    </div>
</div>

<div class="card shadow-lg bg-light bgimg-Divider">
    <div class="card-body my-3">
        <h3 class="card-title text-center">Where to find us</h3>
        <div class="card-body d-flex flex-column">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            Maastrichterstraat 30, 3500 Hasselt
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
            </svg>
            <ul>
                <li>
                    Monday - Thursday: 09:00 - 21:00
                </li>
                <li>
                    Friday - Saturday: 09:00 - 01:00
                </li>
                <li>
                    Sunday & Holiday: 11:00 - 21:00
                </li>
            </ul>
        </div>
    </div>
</div>

@if (Cookie::get('covid19Register') == null)
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Op zoek naar de covid19-registratie?</h5>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="{{ route('covid19Registration')}}">Ja</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
            </div>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
    $(window).on('load', function() {
        $('.modal').modal('show');
    });
</script>

@endsection