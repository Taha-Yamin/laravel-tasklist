@extends('layouts.app')
@section('title')
    {{$task->title}}
@endsection


@section('content')
    <p >{{$task->description}}</p>

    @isset($task->long_description)
    <p>{{$task->long_description}}</p>
    @endisset
    <p>{{$task->completed}}
        @if($task->completed)
        Completed
        @else
        Not Completed
        @endif
    </p>

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>
    <a href="{{ route('tasks.edit',['task'=>$task->id]) }}"><button>Edit</button></a>
    <form Method="POST" action="{{ route('tasks.toggle-complete',['task'=> $task->id] )}}">
        @csrf
        @method('PUT')
        <button type="submit">
            @if($task->completed)
            Mark as Not Completed
            @else
            Mark as Completed
            @endif
        </button>
    </form>
    <form action="{{ route('tasks.destroy',['task'=>$task->id]) }}" method="POST">
        @csrf
        @method('delete')
        
        <button type="submit">Delete</button>
    </form>
    
@endsection
  
