@extends('layouts.app')
@section('title')
    <h1>{{$task->title}}</h1>
@endsection


@section('content')
    <p>{{$task->description}}</p>

    @isset($task->long_description)
    <p>{{$task->long_description}}</p>
    @endisset
    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>
@endsection
  
