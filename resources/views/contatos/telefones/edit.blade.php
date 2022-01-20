@extends('layouts.layout')
@section('title', 'Editar Telefone')
@section('content')
<h1>
    Editar Telefone de {{$contato->nome}}
</h1>

<form action="{{route('contatos.telefones.update', [$contato, $telefone])}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <x-input name="numero" id="numero" :value="old('numero', $telefone->numero)" label="Número" />
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Salvar</button>
</form>

@endsection