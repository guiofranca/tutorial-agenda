@extends('layouts.layout')
@section('title', 'Contatos')
@section('content')
<h1>
    Contatos
</h1>

<p>
    <a class="btn btn-primary" href="{{route('contatos.create')}}">Criar Contato</a>
    <div id="teste"></div>
    <div class="row">
        <div class="col-md-5">
            <x-input id="busca" name="busca" label="Busca por nome" />
        </div>
    </div>
</p>

<table class="table table-striped table-hover" id="contato-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Telefones</th>
            <th>Endereços</th>
            <th class="text-end">Ações</th>
        </tr>
    </thead>
</table>

<script>
    var table;
    $(function(){
        table = $('#contato-table').DataTable({
            serverSide: true,
            ajax: {
                url: "{{route('contatos.datatable')}}",
                data: function(consulta) {
                    consulta.busca = $('#busca').val()
                }
            },
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
            columns: [
                {data: 'nome'},
                {data: 'sexo'},
                {data: 'telefones_count', searchable: false},
                {data: 'enderecos_count', searchable: false},
                {data: function(row) {
                    let showtUrl = "{{route('contatos.show', ':id')}}".replace(':id', row.id)
                    let editUrl = "{{route('contatos.edit', ':id')}}".replace(':id', row.id)
                    let deleteUrl = "{{route('contatos.destroy', ':id')}}".replace(':id', row.id)

                    return `
                    <form action="${deleteUrl}" onsubmit="return confirm('tem certeza?')" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-sm btn-primary" href="${showtUrl}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-sm btn-primary" href="${editUrl}"><i class="bi bi-pencil"></i></a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    </form>
                    `
                }, searchable: false, orderable: false, class: 'text-end'},
            ]
        })
    })

    $('#busca').on('keyup', function(){
        $('#teste').html($('#busca').val())
        table.ajax.reload();
    })
</script>

@endsection