@extends('layouts.appDashboard')

@section('content')
<link href="{{ asset('css/covid19.list.css') }}" rel="stylesheet">

<div class="container bg-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <input class="form-control my-2" type="search" placeholder="Search">
            <div class="container">
                <div class="row">
                    <input type="button" class="btn btn-secondary col-md-11 datepicker" data-date-format="dd-mm-yyyy" value="{{date('d-m-yy')}}" data-provide="datepicker" />
                    <button class="btn btn-outline-success col-md-1">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z" />
                            <path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z" />
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z" />
                        </svg>
                    </button>
                </div>
            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>{{__('Naam')}}</th>
                        <th>{{__('Tijd')}}</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($covid19Registrations as $registration)
                    <tr href="#" data-toggle="modal" data-id="1" data-target="#modalProfile" data-name="{{ $registration->first_name }} {{ $registration->last_name }}" data-created-at="{{ $registration->created_at }}" data-email="{{ $registration->email }}" data-phone="{{ $registration->phone }}" data-number-of-people="{{ $registration->number_of_people }}">
                        <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
                        <td>{{ $registration->created_at }}</td>
                        <td>{{ $registration->number_of_people }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="email"><b>E-mailadres:</b></label>
                            <p id="email"></p>
                            <label for="phone"><b>Telefoon:</b></label>
                            <p id="phone"></p>
                            <label for="registration"><b>Registratie:</b></label>
                            <p id="registration"></p>
                            <label for="numberOfPeople"><b>Aantal mensen:</b></label>
                            <p id="numberOfPeople"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var datepicker = $.fn.datepicker.noConflict();
        $.fn.bootstrapDP = datepicker;

        $('.datepicker').bootstrapDP();

        $('.datepicker').on('changeDate', function() {
            var chosenDate = $('.datepicker:first').bootstrapDP('getFormattedDate');
            $('.datepicker').bootstrapDP('destroy');
            $('.datepicker').val(
                chosenDate
            );
            $.ajax({
                type: 'POST',
                url: '/dashboard/registraties-covid-19',
                data: {
                    date: chosenDate
                },
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                },
                success: function(registrations) {
                    $('.table tbody').empty();
                    $.each(JSON.parse(registrations).covid19Registrations, function(i, profile) {
                        $('.table tbody').append('<tr href="#" data-toggle="modal" data-id="1" data-target="#modalProfile" data-name="' + profile.first_name + " " + profile.last_name + '" data-created-at="' + profile.created_at + '" data-email="' + profile.email + '" data-phone="' + profile.phone + '" data-number-of-people="' + profile.number_of_people + '"><td>' + profile.first_name + " " + profile.last_name + '</td><td>' + profile.created_at + '</td><td>' + profile.number_of_people + '</td></tr>');
                    });
                }
            });
        });

        $('input').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('table tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $('#modalProfile').on('show.bs.modal', function(e) {
        var name = $(e.relatedTarget).data('name');
        var email = $(e.relatedTarget).data('email');
        var phone = $(e.relatedTarget).data('phone');
        var registration = $(e.relatedTarget).data('created-at');
        var numberOfPeople = $(e.relatedTarget).data('number-of-people');

        $(e.currentTarget).find('#modalTitle').text(name);
        $(e.currentTarget).find('#email').text(email);
        $(e.currentTarget).find('#phone').text(phone);
        $(e.currentTarget).find('#registration').text(registration);
        $(e.currentTarget).find('#numberOfPeople').text(numberOfPeople);

    });
</script>

@endsection