@extends('layouts.app')

@section('content')

<!-- checking errors -->
@if ($errors->any())

    @foreach ($errors->all() as $error)
    
    <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    
    @endforeach

@endif

    <div class="container-fluid">
        <form action="/tasks" method="POST">
            
            @csrf

            <div class=" form-group ">
                <label for="description" class=" fs-4 text-dark fw-semibold  "> Description</label>
                <input type="text" name="description" id="description" class=" form-control ">
            </div>

            <button type="submit" class=" btn btn-primary mt-3 text-capitalize ">Create Task</button>
        </form>
    </div>
    

@endsection