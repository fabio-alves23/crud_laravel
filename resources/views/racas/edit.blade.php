@extends('layouts.app')

@section('content')
<h2>Editar Raça</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('racas.update', $raca->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome', $raca->nome) }}" required>
    </div>
    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('racas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
