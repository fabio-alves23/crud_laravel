@extends('layouts.app')

@section('content')
<h2>Novo Animal</h2>

<form action="{{ route('animais.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
    </div>

    <div class="mb-3">
        <label for="raca_id" class="form-label">Raça</label>
        <select name="raca_id" id="raca_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($racas as $raca)
                <option value="{{ $raca->id }}" {{ old('raca_id') == $raca->id ? 'selected' : '' }}>{{ $raca->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="propriedade_id" class="form-label">Propriedade</label>
        <select name="propriedade_id" id="propriedade_id" class="form-control" required>
            <option value="">Selecione</option>
            @foreach($propriedades as $propriedade)
                <option value="{{ $propriedade->id }}" {{ old('propriedade_id') == $propriedade->id ? 'selected' : '' }}>{{ $propriedade->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="idade" class="form-label">Idade</label>
        <input type="number" name="idade" id="idade" class="form-control" value="{{ old('idade') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('animais.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
