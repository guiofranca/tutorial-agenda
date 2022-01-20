@extends('layouts.layout')
@section('title', 'Criar Endereço')
@section('content')
<h1>
    Criar Endereço para {{$contato->nome}}
</h1>

<form action="{{route('contatos.enderecos.store', $contato)}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <x-input name="bairro" id="bairro" :value="old('bairro')" label="Bairro" />
                <x-input name="cidade" id="cidade" :value="old('cidade')" label="Cidade" />
                <x-input name="estado" id="estado" :value="old('estado')" label="Estado" />
                <x-input name="cep" id="cep" :value="old('cep')" label="Cep" />
                <x-input name="logradouro" id="logradouro" :value="old('logradouro')" label="Logradouro" />
                <x-input name="numero" id="numero" :value="old('numero')" label="Número" />
                <x-input name="complemento" id="complemento" :value="old('complemento')" label="Complemento" />
                <x-input name="descricao" id="descricao" :value="old('descricao')" label="Descrição" />
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Criar</button>
</form>

@endsection