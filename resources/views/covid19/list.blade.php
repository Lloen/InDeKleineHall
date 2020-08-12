@extends('layouts.app')

@section('content')
<div class="container bg-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <input class="form-control my-2" type="search" placeholder="Search">
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
                    <tr data-toggle="modal" data-id="1" data-target="#modalProfile" data-name="{{ $registration->first_name }} {{ $registration->last_name }}" data-created-at="{{ $registration->created_at }}" data-email="{{ $registration->email }}" data-phone="{{ $registration->phone }}" data-number-of-people="{{ $registration->number_of_people }}">
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
                            <label for="email">E-mailadres:</label>
                            <p id="email"></p>
                            <label for="phone">Telefoon:</label>
                            <p id="phone"></p>
                            <label for="registration">Registratie:</label>
                            <p id="registration"></p>
                            <label for="numberOfPeople">Aantal mensen:</label>
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