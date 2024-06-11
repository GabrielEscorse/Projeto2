@extends('TemplateAdmin.index')

@section('contents')

@php
    $titulo = "Inclusão de nova categoria";
    $endpoint = "/categoria/novo";
    $input_nome = "";
    $input_id = "id";

    if(isset($categoria)){
    $titulo = "Alteração de categoria";
    $endpoint = "/categoria/update";
    $input_nome = $categoria['nome'];
    $input_id = $categoria['id'];
    }
@endphp

<h1 class="h3 mb-4 text-gray-800">{{$titulo}}</h1>

<div class="card">
    <div class="card-header">
        Nova categoria
    </div>
    <div class="card-body">
        <form method="post" action="{{$endpoint}}">
            @csrf

            <input name="id" value="{{$input_id}}" hidden>
            <label for="exampleDataList" class="form-label">Nome da categoria</label>
            <input class="form-control" name="nome" placeholder="Digite a categoria" value="{{$input_nome}}">

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
