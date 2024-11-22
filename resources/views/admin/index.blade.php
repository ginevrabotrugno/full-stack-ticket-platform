@extends('layouts.app')

@section('content')
    <div class="row justify-content-between">
        <div class="col-md-3 row justify-content-between items-center">
            <div class="col-6">
                <h5>Tickets</h5>
            </div>
            <div class="col-6">
                <div class="rounded-circle bg-primary p-4 position-relative" style="width: 40px; height: 40px;">
                    <span class="position-absolute top-50 start-50 translate-middle text-white fs-5">{{$allTicketsCount}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 row justify-content-between items-center">
            <div class="col-6">
                <h5>Assigned</h5>
            </div>
            <div class="col-6">
                <div class="rounded-circle bg-success p-4 position-relative" style="width: 40px; height: 40px;">
                    <span class="position-absolute top-50 start-50 translate-middle text-white fs-5">{{$assignedTickets}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 row justify-content-between items-center">
            <div class="col-6">
                <h5>In Progress</h5>
            </div>
            <div class="col-6">
                <div class="rounded-circle bg-warning p-4 position-relative" style="width: 40px; height: 40px;">
                    <span class="position-absolute top-50 start-50 translate-middle fs-5">{{$inProgressTickets}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 row justify-content-between items-center">
            <div class="col-6">
                <h5>Closed</h5>
            </div>
            <div class="col-6">
                <div class="rounded-circle bg-secondary p-4 position-relative" style="width: 40px; height: 40px;">
                    <span class="position-absolute top-50 start-50 translate-middle text-white fs-5">{{$closedTickets}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between items-center mt-5">
        <div class=" col-md-4 list-group">
            @foreach ($categories as $category)
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <div width="32" height="32" class="rounded-circle flex-shrink-0">
                    @if($category->id == 1)
                            <i class="fa-solid fa-headset"></i>
                        @elseif($category->id == 2)
                            <i class="fa-solid fa-file-invoice"></i>
                        @elseif($category->id == 3)
                            <i class="fa-regular fa-circle-question"></i>
                        @elseif($category->id == 4)
                            <i class="fa-solid fa-bars-progress"></i>
                        @elseif($category->id == 5)
                            <i class="fa-solid fa-cart-shopping"></i>
                        @else
                            <i class="fa-solid fa-circle"></i>
                        @endif
                </div>
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{$category->name}}</h6>
                        <p class="mb-0 opacity-75">{{$category->description}}</p>
                    </div>
                    <strong class="text-nowrap">{{count($category->tickets)}}</strong>
                </div>
                </a>
            @endforeach
        </div>
        <div class="col-6">
            <table class="table table-hover text-center lh-lg">
                <thead>
                  <tr>
                    <th scope="col">Operator</th>
                    <th scope="col">Assigned Tickets</th>
                    <th scope="col">In Progress Tickets</th>
                    <th scope="col">Closed Tickets</th>
                    <th scope="col">TOT</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($operators as $operator)
                        <tr>
                            <td>{{$operator->name}}</th>
                            <td>{{$operatorTicketCounts[$operator->id]['assigned']}}</td>
                            <td>{{$operatorTicketCounts[$operator->id]['inProgress']}}</td>
                            <td>{{$operatorTicketCounts[$operator->id]['closed']}}</td>
                            <th>{{count($operator->tickets)}}</th>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
