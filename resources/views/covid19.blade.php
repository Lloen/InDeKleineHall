<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Covid</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">In De Kleine Hal Registratie Covid-19</h5>
        </div>
        <div class="card-body">
            <p class="card-text text-center">Beste klant, door de recent gewijzigde maatregelen met betrekking tot COVID-19 zijn wij
                verplicht te registreren
                welke personen aanwezig zijn geweest In De Kleine Hal.</p>

            <!-- Success message -->
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if (Cookie::get('covid19Register') == null)
            <form action="{{ action('Covid19Controller@register') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">Naam</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="Naam" name="firstName" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Achternaam</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Achternaam" name="lastName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail">E-mailadres</label>
                    <input type="email" class="form-control contact-group" id="inputEmail" name="email">
                </div>
                <p class="text-center">OF</p>
                <div class="form-group">
                    <label for="inputPhone">Telefoon</label>
                    <input type="text" class="form-control contact-group" id="inputPhone" name="phone">
                </div>
                <div class="form-group">
                    <label for="inputPeople">Aantal mensen</label>
                    <select class="form-control" name="numberOfPeople" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
                <p class="text-center">Uw gegevens worden nooit met iemand gedeeld.</p>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Verzenden" />
            </form>
            @else
            <h1 class="card-text text-center">✔️</h1>
            <h2 class="card-text text-center"> Geregistreerd voor vandaag, laat dit aan de ober zien. </h2>
            <h2 class="card-text text-center"> Stay safe! </h2>
            <h5 class="card-text text-center"> With ❤️ In De Kleine Hal </h5>
            <p class="card-text text-center">{{ request()->cookie('covid19Register') }} {{ date("Y-m-d") }}</p>
            @endif
        </div>
    </div>
</body>

<script type="text/javascript">
    $.validator.messages.required = 'Dit is vereist.';
    $("form").validate({
        rules: {
            email: {
                required: '#inputPhone:blank'
            },
            phone: {
                required: '#inputEmail:blank'
            }
        }
    });
</script>

</html>