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

@foreach ($tickets as $ticket)
    <div class="modal fade" id="modalSheet{{ $ticket->id }}" tabindex="-1" aria-labelledby="modalSheetLabel{{ $ticket->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5" id="modalSheetLabel{{ $ticket->id }}">Edit <strong>{{$ticket->title}}</strong> Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="{{ route('admin.tickets.update', $ticket) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <select name="status" id="status" class="form-select" data-selected="{{ $ticket->status }}" required>
                                <option value="assigned" @if ($ticket->status === 'assigned') selected @endif>Assigned</option>
                                <option value="in progress" @if ($ticket->status === 'in progress') selected @endif>In Progress</option>
                                <option value="closed" @if ($ticket->status === 'closed') selected @endif>Closed</option>
                            </select>
                        </div>

                        <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                            <button type="submit" class="btn btn-lg btn-primary">Save changes</button>
                            <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="filter-box p-3 mb-4 rounded-3 bg-light">
    <form action="{{ route('admin.tickets.index') }}" method="GET" class="row justify-content-center g-3">
        <div class="col-md-4">
            <label for="category" class="form-label">Filter by Category</label>
            <select name="category" id="category" class="form-select">
                <option value="" selected>All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if (request('category') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Filter by Status</label>
            <select name="status" id="status" class="form-select">
                <option value="" selected>All Status</option>
                <option value="assigned" @if (request('status') === 'assigned') selected @endif>Assigned</option>
                <option value="in progress" @if (request('status') === 'in progress') selected @endif>In Progress</option>
                <option value="closed" @if (request('status') === 'closed') selected @endif>Closed</option>
            </select>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Apply Filters</button>
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary ms-2">Clear Filters</a>
        </div>
    </form>
</div>

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
                        <!-- Bottone per aprire il modal per modificare il ticket -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSheet{{ $ticket->id }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    let modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        modal.addEventListener('shown.bs.modal', function () {
            let select = modal.querySelector('select#status');
            let value = select.getAttribute('data-selected');
            if (value) {
                select.value = value;
            }
        });
    });

    // Toast logic
    let toastEl = document.querySelector('.toast');
    if (toastEl) {
        let toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
});

</script>

@endsection
