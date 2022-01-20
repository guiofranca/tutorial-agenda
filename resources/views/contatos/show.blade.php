@extends('layouts.layout')
@section('title', 'Contato')
@section('content')

<style>
    .remove_button_css { 
  outline: none;
  padding: 5px; 
  border: 0px; 
  box-sizing: none; 
  background-color: transparent; 
}
</style>
<h1>
    Contato <a class="btn btn-sm btn-primary" href="{{route('contatos.edit', $contato)}}"><i class="bi bi-pencil"></i></a>
</h1>

<ul>
    <li><strong>Nome:</strong> {{$contato->nome}}</li>
    <li><strong>Sexo:</strong> {{$contato->sexo}}</li>
    <li><strong>Telefones:</strong> <a href="{{route('contatos.telefones.create', $contato)}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i></a>
        <ul>
            @forelse ($contato->telefones as $telefone)
            <li>
                <form action="{{route('contatos.telefones.destroy', [$contato, $telefone])}}" method="POST" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('contatos.telefones.edit', [$contato, $telefone])}}"><i class="bi bi-pencil"></i></a> 
                    <button type="submit" class="remove_button_css"><i class="bi bi-trash text-danger"></i></button>
                    {{$telefone->numero}}
                </form>
            </li>
            @empty
            <li>Não há telefones cadastrados</li>
            @endforelse
        </ul>
    </li>
    <li><strong>Endereços:</strong> <a href="{{route('contatos.enderecos.create', $contato)}}" class="btn btn-sm btn-success"><i class="bi bi-plus"></i></a>
        <ul>
            @forelse ($contato->enderecos as $endereco)
            <li>
                <form action="{{route('contatos.enderecos.destroy', [$contato, $endereco])}}" method="POST" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('contatos.enderecos.edit', [$contato, $endereco])}}"><i class="bi bi-pencil"></i></a> 
                    <button type="submit" class="remove_button_css"><i class="bi bi-trash text-danger"></i></button>
                    {{$endereco->logradouro}} {{$endereco->numero}} {{$endereco->cep}}
                </form>
            </li>
            @empty
            <li>Não há endereços cadastrados</li>
            @endforelse
        </ul>
    </li>
</ul>

@endsection