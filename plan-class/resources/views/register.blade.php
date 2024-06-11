@extends('layouts.master')

@section('titulo','Register')

@section('content')
@if(session()->has('message'))
    {{session()->get('message')}}
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1>Registre-se</h1>
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Seu nome" >
    <input type="text" name="email" placeholder="Seu email" >
    <input type="text" name="password" placeholder="Sua senha" >
    <input type="text" name="password_confirmation" placeholder="Confirme sua senha">

    <button type="submit">Cadastrar</button>
</form>
@endsection