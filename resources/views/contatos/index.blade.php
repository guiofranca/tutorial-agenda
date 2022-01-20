@extends('layouts.layout')
@section('title', 'Contatos')
@section('content')
<h1>
    Contatos
</h1>

<p>
    <a class="btn btn-primary" href="{{route('contatos.create')}}">Criar Contato</a>
</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Telefones</th>
            <th>Endereços</th>
            <th class="text-end">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contatos as $contato)
            <tr>
                <td>{{$contato->nome}}</td>
                <td>{{$contato->sexo}}</td>
                <td>{{$contato->telefones_count}}</td>
                <td>{{$contato->enderecos_count}}</td>
                <td class="text-end">
                    <form action="{{route('contatos.destroy', $contato)}}" onsubmit="return confirm('tem certeza?')" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-sm btn-primary" href="{{route('contatos.show', $contato)}}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-sm btn-primary" href="{{route('contatos.edit', $contato)}}"><i class="bi bi-pencil"></i></a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>N/A</td>
                <td>N/A</td>
            </tr>
        @endforelse
    </tbody>
</table>



@endsection