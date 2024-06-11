@extends('TemplateAdmin.index')

@section('contents')

@php
    $titulo = "Inclusão de nova marca";
    $endpoint = "/marca/novo";
    $input_nome = "";
    $input_fantasia = "";
    $input_id = "id";

    if(isset($marca)){
    $titulo = "Alteração de marca";
    $endpoint = "/marca/update";
    $input_nome = $marca['nome'];
    $input_fantasia = $marca['nome_fantasia'];
    $input_id = $marca['id'];

    }
@endphp
<h1 class="h3 mb-4 text-gray-800">{{$titulo}}</h1>

<div class="card">
    <div class="card-header">
        Nova marca
    </div>
    <div class="card-body">
        <form method="post" action="{{$endpoint}}">
            @csrf

            <input name="id" value="{{$input_id}}" hidden>
            <label for="exampleDataList" class="form-label">Nome da marca</label>
            <input class="form-control" name="nome" placeholder="Digite a marca" value="{{$input_nome}}">

            <label for="exampleDataList" class="form-label">Nome Fantasia</label>
            <input class="form-control" name="nome_fantasia" placeholder="Digite o nome fantasia" value="{{$input_fantasia}}">

            <label for="exampleDataList" class="form-label">Situação</label>
            <select class="form-control" name="situacao">
                <option selected value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>

            <br/>
            <input type="submit" class="btn btn-success" value="salvar"/>

        </form>
    </div>
</div>

@endsection
