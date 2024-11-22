@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td> {{ $ticket->title }} </td>
                <td> {{ $ticket->status }} </td>
                <td> {{ $ticket->created_at }} </td>
                <td> Azioni </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
