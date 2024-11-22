@extends('layouts.app')

@section('content')
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
