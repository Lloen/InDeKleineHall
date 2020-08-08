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

            @php
            {{
                $firstName = "";
                $lastName = "";
                $email = "";
                $phone = "";

                if(Cookie::get('covid19Profile') != null)
                {
                    $profile = json_decode(request()->cookie('covid19Profile'));

                    $firstName = $profile->first_name;
                    $lastName = $profile->last_name;
                    $email = $profile->email;
                    $phone = $profile->phone;
                }
            }}
            @endphp

            @if (Cookie::get('covid19Register') == null)
            <form action="{{ action('Covid19Controller@register') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">Naam</label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="Naam" name="firstName" value="{{$firstName}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Achternaam</label>
                        <input type="text" class="form-control" id="inputLastName" placeholder="Achternaam" name="lastName" value="{{$lastName}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail">E-mailadres</label>
                    <input type="email" class="form-control contact-group" id="inputEmail" name="email" value="{{$email}}">
                </div>
                <p class="text-center">OF</p>
                <div class="form-group">
                    <label for="inputPhone">Telefoon</label>
                    <input type="text" class="form-control contact-group" id="inputPhone" name="phone" value="{{$phone}}">
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
            <div class="text-center mb-3">
                <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-patch-check" fill="#008000" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                </svg>
            </div>
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