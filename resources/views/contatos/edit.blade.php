@extends('layouts.layout')
@section('title', 'Editar Contato')
@section('content')
<h1>
    Editar Contato
</h1>

<form action="{{route('contatos.update', $contato)}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input class="form-control" id="nome" name="nome" value="{{old('nome', $contato->nome)}}">
                @error('nome')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <input class="form-control" id="sexo" name="sexo" value="{{old('sexo', $contato->sexo)}}">
                @error('sexo')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
    </div>


    <button class="btn btn-primary" type="submit">Criar</button>
</form>

@endsection