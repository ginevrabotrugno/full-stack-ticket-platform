@extends('layouts.app')

@section('content')
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

    <h1 class="my-4 text-dark pb-3 border-bottom border-3" style="font-size: 2.5rem;">
        <i class="fas fa-ticket-alt" style="font-size: 1.5rem;"></i> {{ $ticket->title }}
    </h1>

    <div class="row justify-content-center align-items-start my-5">
        <div class="col-md-6">
            <h2 class="text-dark pb-3 mb-3 border-bottom border-3" style="font-size: 1.8rem;">
                <i class="fa-solid fa-circle-info" style="font-size: 1.5rem;"></i> Info
            </h2>
            <div class="mb-3" style="font-size: 1.2rem;">
                <strong><i class="fa-regular fa-clock" style="color: #ffc400;"></i> Date: </strong>
                <span class="badge bg-light text-dark" style="font-size: 1.1rem;">{{ ($ticket->created_at)->format('d/m/Y - h:m') }}</span>
            </div>

            <div class="mb-3" style="font-size: 1.2rem;">
                <strong><i class="fas fa-folder-open" style="color: #007bff;"></i> Category: </strong>
                <span class="badge bg-light text-dark" style="font-size: 1.1rem;">{{ $ticket->category->name }}</span>
            </div>

            <div class="mb-3" style="font-size: 1.2rem;">
                <strong><i class="fas fa-check-circle" style="color: #28a745;"></i> Status: </strong>
                <span class="badge bg-light text-dark" style="font-size: 1.1rem;">{{ ucwords($ticket->status) }}</span>
                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSheet{{ $ticket->id }}">
                    <i class="fa-regular fa-pen-to-square"></i>
                </button>
            </div>

            <div class="mb-3" style="font-size: 1.2rem;">
                <strong><i class="fas fa-user-tie" style="color: #971370;"></i> Operator: </strong>
                <span class="badge bg-light text-dark" style="font-size: 1.1rem;">{{ $ticket->operator->name }}</span>
            </div>
        </div>

        <div class="col-md-6">
            <h2 class="text-dark pb-3 mb-3 border-bottom border-3" style="font-size: 1.8rem;">
                <i class="fas fa-align-left" style="font-size: 1.5rem;"></i> Description
            </h2>
            <p class="bg-light p-3 border rounded" style="font-size: 1.2rem; line-height: 1.6;">
                {{ $ticket->description }}
            </p>
        </div>
    </div>
@endsection
