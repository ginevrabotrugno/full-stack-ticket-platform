@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th class="text-center">Category</th>
            <th class="text-center">Status</th>
            <th class="text-center">Date</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <td> {{ $ticket->title }} </td>
                <td class="text-center"> Category </td>
                <td class="text-center"> {{ $ticket->status }} </td>
                <td class="text-center"> {{ ($ticket->created_at)->format('d/m/Y') }} </td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-success">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-warning">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
