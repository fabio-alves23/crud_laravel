@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Login</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Use route() para garantir que a URL da rota seja correta -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- Token CSRF obrigatório -->

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>

                <p class="mt-3 text-center">
                    Não tem conta? <a href="{{ route('register') }}">Registrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
