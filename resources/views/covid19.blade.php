<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Covid</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registratie Covid-19</h5>
            <p class="card-text">Beste klant, door de recent gewijzigde maatregelen met betrekking tot COVID-19 zijn wij
                verplicht te registreren
                welke personen aanwezig zijn geweest In De Kleine Hall.</p>

            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">Naam</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="Naam">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSurname">Achternaam</label>
                        <input type="text" class="form-control" id="inputSurname" placeholder="Achternaam">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail">E-mailadres</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="form-group">
                        <label for="inputPhone">Telefoon</label>
                        <input type="text" class="form-control" id="inputPhone">
                    </div>
                <button type="submit" class="btn btn-primary">Verzenden</button>
            </form>

        </div>
    </div>
</body>

</html>
