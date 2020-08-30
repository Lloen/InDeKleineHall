@extends('layouts.app')

@section('content')
<a href="{{ route('menu-onderdeel.create') }}" class="btn btn-success btn-block">{{__('Toevoegen')}}</a>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>{{__('Naam')}}</th>
            <th>cl</th>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($menuItems as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td><a href="" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection