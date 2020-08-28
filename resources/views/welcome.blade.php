@extends('layouts.app')
<style>
    body,
    html {
        height: 100%;
    }

    .blur {
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(15px);
    }

    .bgimg-1 {
        background-image: url("{{ asset('img/Welcome.InDeKleineHal.jpg') }}");
        background-size: cover;
    }

    .bgimg-2 {
        background-image: url("{{ asset('img/OldPicture.InDeKleineHal.jpg') }}");
        background-size: none;
    }

    .bgimg-1,
    .bgimg-2,
    .bgimg-3 {
        min-height: 100%;
        max-width: 100%;
        height: 100%;
        position: relative;

        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: fill;
    }
</style>

@section('content')
<div class="bgimg-1">
    <div class="col-sm-12 d-flex align-items-center justify-content-center blur">
        <img class="" src="{{ asset('img/InDeKleineHalWhiteLogo.png') }}" width="176" height="247">
    </div>
</div>

<div class="card align-items-center bgimg-Divider">
    <div class="card-body my-3">
        <h3 class="card-title text-center">The oldest pub in Hasselt</h3>
        <h6 class="card-subtitle mb-2 text-muted text-center">Since 1836</h6>
        <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
</div>

<div class="bgimg-2">
</div>

<div class="card align-items-center bgimg-Divider">
    <div class="card-body my-3">
        <h3 class="card-title text-center">Our drinks</h3>
        <h6 class="card-subtitle mb-2 text-muted text-center">We have a great variety of alcholic and non-alcholoic drinks</h6>
        <a class="btn btn-primary btn-lg text-center btn-block" href="{{ route('menu') }}">{{ __('🍺 Check out our Menu 🍺') }}</a>
    </div>
</div>

<div class="parallax"></div>
@endsection