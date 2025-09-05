@extends('layouts.app')

@section('content')
<h2>Editar Animal</h2>

<form action="{{ route('animais.update', $animal->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="mb-3">
    <label for="nome_do_animal" class="form-label">Nome do Animal</label>
    <input type="text" class="form-control" name="nome_do_animal" value="{{ old('nome_do_animal', $animal->nome_do_animal ?? '') }}">
</div>

<div class="mb-3">
    <label for="especie" class="form-label">Espécie</label>
    <input type="text" class="form-control" name="especie" value="{{ old('especie', $animal->especie ?? '') }}">
</div>


    <div class="mb-3">
        <label for="raca_id" class="form-label">Raça</label>
        <select name="raca_id" id="raca_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($racas as $raca)
                <option value="{{ $raca->id }}" {{ (old('raca_id', $animal->raca_id) == $raca->id) ? 'selected' : '' }}>{{ $raca->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="propriedade_id" class="form-label">Propriedade</label>
        <select name="propriedade_id" id="propriedade_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($propriedades as $propriedade)
                <option value="{{ $propriedade->id }}" {{ (old('propriedade_id', $animal->propriedade_id) == $propriedade->id) ? 'selected' : '' }}>{{ $propriedade->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="number" name="idade" id="idade" class="form-control" value="{{ old('idade', $animal->idade) }}" required>
    </div>

    <div class="mb-3">
        <label for="peso" class="form-label">Peso (kg)</label>
        <input type="number" name="peso" id="peso" class="form-control" value="{{ old('peso', $animal->peso) }}" step="0.01" min="0">
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
