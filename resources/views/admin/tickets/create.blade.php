@extends('layouts.app')

@section('content')
<h1>New Ticket</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif

<form class="my-3" action="{{ route('admin.tickets.store') }}" method="POST">
    @csrf
        <div class="my-3">
            <small>Fields marked with * are mandatory</small>
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Title*</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" style="resize: none;" required></textarea>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-md-4">
              <label for="status" class="form-label">Status*</label>
              <select name="status" id="status" class="form-select" required>
                <option value="assigned">Assigned</option>
                <option value="in progress">In Progress</option>
                <option value="closed">Closed</option>
              </select>
            </div>

            <div class="col-md-4">
              <label for="operator" class="form-label">Operator*</label>
              <select name="operator" id="operator" class="form-select" required>
                @foreach ($operators as $operator)
                    <option value="{{$operator->id}}">{{$operator->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <label for="category" class="form-label">Category*</label>
              <select name="category" id="category" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>

        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <button type="reset" class="btn btn-secondary mt-3">Reset</button>
    </form>
@endsection
