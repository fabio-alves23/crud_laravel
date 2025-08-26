@extends('layouts.app')

@section('content')
<h2>Criar Vacinação</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('vacinacoes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="animal_id" class="form-label">Animal</label>
        <select name="animal_id" class="form-select" required>
            <option value="">Selecione o animal</option>
            @foreach($animais as $animal)
            <option value="{{ $animal->id }}">{{ $animal->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="nome_vacina" class="form-label">Nome da Vacina</label>
        <input type="text" name="nome_vacina" class="form-control" id="nome_vacina" value="{{ old('nome_vacina') }}" required>
    </div>
    <div class="mb-3">
        <label for="data_aplicacao" class="form-label">Data de Aplicação</label>
        <input type="date" name="data_aplicacao" class="form-control" id="data_aplicacao" value="{{ old('data_aplicacao') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('vacinacoes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
