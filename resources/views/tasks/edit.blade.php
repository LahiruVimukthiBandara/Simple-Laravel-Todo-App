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
        <form action="{{URL('editdata/'.$tasks->id)}}" method="POST">
            
            @csrf
            @method('put')

            <div class=" form-group ">
                <label for="description" class=" fs-4 text-dark fw-semibold  "> Description</label>
                <input type="text" name="editedDescription" id="editedDescription" class=" form-control " value="{{ $tasks->description }}">
            </div>

            <button type="submit" class=" btn btn-success mt-3 text-capitalize ">Updata The Task</button>
        </form>
    </div>

@endsection