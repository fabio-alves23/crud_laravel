@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Bem-vindo ao ZOOTECNIA </h1>
    <p>No menu acima você pode fazer seus cadastros </p>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-3">
            <a href="{{ route('racas.index') }}" class="btn btn-primary w-100 mb-2">Raças</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('propriedades.index') }}" class="btn btn-success w-100 mb-2">Propriedades</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('animais.index') }}" class="btn btn-warning w-100 mb-2">Animais</a>
        </div>
    </div>
</div>
@endsection
