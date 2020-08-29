@extends('layouts.appDashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-outline-dark btn-block" href="{{ route('covid19Registraties') }}">Covid-19 registraties</a>
                    <a class="btn btn-outline-dark btn-block disabled" href="{{ route('covid19Registraties') }}">Menu</a>
                    <a class="btn btn-outline-dark btn-block disabled" href="{{ route('covid19Registraties') }}">Openingstijden</a>
                    <a class="btn btn-outline-dark btn-block disabled" href="{{ route('covid19Registraties') }}">Beer logo afbeeldingen</a>
                    <a class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Uitloggen
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection