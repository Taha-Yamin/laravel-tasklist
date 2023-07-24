
@extends('layouts.app')

@section('title')
<h1>Hello there.. Welcome to my laravel world...</h1>
@endsection

@section('content')
    
@forelse($tasks as $task)
    <div><a href="{{ route('tasks.show',['id'=>$task->id]) }}">{{$task->title}}</a></div>
    @empty
    <div>The list is empty</div>
    @endforelse
@endsection
