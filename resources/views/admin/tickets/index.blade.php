@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

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
                <td class="text-center"> {{ $ticket->category->name }} </td>
                <td class="text-center"> {{ ucwords($ticket->status) }} </td>
                <td class="text-center"> {{ ($ticket->created_at)->format('d/m/Y') }} </td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href=" {{ route('admin.tickets.show', $ticket) }} " type="button" class="btn btn-success">
                            <i class="fa-regular fa-eye"></i>
                        </a>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let toastEl = document.querySelector('.toast');
        if (toastEl) {
            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
@endsection
