@extends('layouts.main')

@section('title', 'Hello Page')

@section('contents')

    <h1>Hello {{$variable1}}</h1>

    @if(false)
        It's true
    @else
        It's not true
    @endif

@endsection