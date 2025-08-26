@extends('layouts.app')

@section('content')
<h2>Criar Raça</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('racas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('racas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
