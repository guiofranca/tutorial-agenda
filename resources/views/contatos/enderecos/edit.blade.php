@extends('layouts.layout')
@section('title', 'Editar Endereço')
@section('content')
<h1>
    Editar Endereço para {{$contato->nome}}
</h1>

<form action="{{route('contatos.enderecos.update', [$contato, $endereco])}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <x-input name="bairro" id="bairro" :value="old('bairro', $endereco->bairro)" label="Bairro" />
                <x-input name="cidade" id="cidade" :value="old('cidade', $endereco->cidade)" label="Cidade" />
                <x-input name="estado" id="estado" :value="old('estado', $endereco->estado)" label="Estado" />
                <x-input name="cep" id="cep" :value="old('cep', $endereco->cep)" label="Cep" />
                <x-input name="logradouro" id="logradouro" :value="old('logradouro', $endereco->logradouro)" label="Logradouro" />
                <x-input name="numero" id="numero" :value="old('numero', $endereco->numero)" label="Número" />
                <x-input name="complemento" id="complemento" :value="old('complemento', $endereco->complemento)" label="Complemento" />
                <x-input name="descricao" id="descricao" :value="old('descricao', $endereco->descricao)" label="Descrição" />
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Salvar</button>
</form>

@endsection