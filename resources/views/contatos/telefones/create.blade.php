@extends('layouts.layout')
@section('title', 'Criar Telefone')
@section('content')
<h1>
    Criar Telefone para {{$contato->nome}}
</h1>

<form action="{{route('contatos.telefones.store', $contato)}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <x-input name="numero" id="numero" :value="old('numero')" label="Número" />
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Criar</button>
</form>

@endsection