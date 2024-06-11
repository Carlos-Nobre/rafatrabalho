@extends('layouts.master')

@section('titulo','Welcome')

@section('content')
    <a href="{{route('user.register')}}">Register</a>

@endsection