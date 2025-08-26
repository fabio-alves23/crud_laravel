@extends('layouts.app')

@section('content')
<h2>Editar Animal</h2>

<form action="{{ route('animais.update', $animal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $animal->nome) }}" required>
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

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
