
@extends('layouts.app')

@section('title')
My To Do List
@endsection

@section('content')
<nav class="mb-4 text-lg"><a href="{{ route('tasks.create')}} " class="btn"> Add a new task</a> </nav>

   
@forelse($tasks as $task)
    <div><a href="{{ route('tasks.show',['task'=>$task->id]) }}"@class(['line-through' => $task->completed])>{{$task->title}}</a></div>
    @empty
    <div>The list is empty</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4 ">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
