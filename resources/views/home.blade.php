@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Bem-vindo ao ZOOTECNIA </h1>
    <p> <h5> você pode cadastrar seus animais </h5> </p>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-3">
            @auth
            <a href="{{ route('racas.index') }}" class="btn btn-primary w-100 mb-2">Raças</a>
            @else
            <a href="{{ route('login')}}" class="btn btn-primary w-100 mb-2">Raças</a>
            @endauth
        </div>
        <div class="col-md-3">
            @auth 
            <a href="{{ route('propriedades.index') }}" class="btn btn-success w-100 mb-2">Propriedades</a>
            @else
             <a href="{{ route('login') }}" class="btn btn-success   w-100 mb-2">Propriedades</a>
             @endauth
        </div>
        <div class="col-md-3">
            @auth
    <a href="{{ route('animais.index') }}" class="btn btn-warning w-100 mb-2">Animais</a>
            @else
    <a href="{{ route('login') }}" class="btn btn-warning w-100 mb-2">Animais</a>
            @endauth

        </div>
    </div>
</div>
@endsection
