@extends('layouts.layout')
@section('title', 'Criar Contato')
@section('content')
<h1>
    Criar Contato
</h1>

<form action="{{route('contatos.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input class="form-control" id="nome" name="nome" value="{{old('nome')}}">
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
                <input class="form-control" id="sexo" name="sexo" value="{{old('sexo')}}">
                @error('sexo')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
    </div>


    <button class="btn btn-primary" type="submit">Criar</button>
</form>

@endsection