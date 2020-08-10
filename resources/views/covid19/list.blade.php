@extends('layouts.app')

@section('content')
<table class="table table-bordered table-sm">
    <thead class="thead-light">
        <tr>
            <th>{{__('Naam')}}</th>
            <th>{{__('Tijd')}}</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach($covid19Registrations as $registration)
        <tr data-toggle="modal" data-id="1" data-target="#exampleModal">
            <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
            <td>{{ $registration->created_at }}</td>
            <td>{{ $registration->number_of_people }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">

</script>