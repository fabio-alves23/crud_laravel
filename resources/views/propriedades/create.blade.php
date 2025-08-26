@extends('layouts.app')

@section('content')
<h2>Criar Propriedade</h2>

<!-- Mensagem de erros de validação -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('propriedades.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" value="{{ old('nome') }}" required>
    </div>
    <div class="mb-3">
        <label for="localizacao" class="form-label">Localização</label>
        <input type="text" name="localizacao" class="form-control" id="localizacao" value="{{ old('localizacao') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('propriedades.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
