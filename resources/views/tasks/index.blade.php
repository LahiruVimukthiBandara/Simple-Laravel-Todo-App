@extends('layouts.app')

@section('content')
<h2>These are your tasks.</h2>

<!-- display our all tasks-->

@foreach ($tasks as $item)

<div class="card mb-2 ">
    <div class="card-body d-flex justify-content-between ">
        {{ $item->description }}

        <form action="tasks/{{ $item->id }}" method="post">
        
            @method('PATCH')
            @csrf
            <!-- if completed lable completed appire-->
            @if ($item->isCompleted())
            
                <span class="badge text-bg-warning text-white p-2 "> Completed </span>
            
            @endif
            <!-- if not completed button appire-->
            @if (!$item->isCompleted())
            
                <button type="submit" class="btn btn-secondary  "> Complete </button>
                <a href="{{ URL('edit/'.$item->id) }}" type="submit" class="btn btn-success mx-3 "> edit </a>
                
            @else
            
            <form action="tasks/{{ $item->id }}" method="post">
                @method('delete')
                @csrf
                <button onsubmit="successalt()" type="submit" class="btn btn-danger mx-3 "> delete </button>
            </form>
            
            @endif
        </form>
   
    </div>
  </div>

  <script>
    function successalt(){
        alert('delete successfully..!');
    }
  </script>

@endforeach

<a href="create" class="btn btn-primary btn-lg btn-block text-capitalize   ">create new task</a>

@endsection
    
