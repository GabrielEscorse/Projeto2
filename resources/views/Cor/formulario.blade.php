@extends('TemplateAdmin.index')

@section('contents')

@php
    $titulo = "Inclusão de nova cor";
    $endpoint = "/cor/novo";
    $input_nome = "";
    $input_id = "id";

    if(isset($cor)){
    $titulo = "Alteração de cor";
    $endpoint = "/cor/update";
    $input_nome = $cor['cor'];
    $input_id = $cor['id'];
    }
@endphp

<h1 class="h3 mb-4 text-gray-800">{{$titulo}}</h1>

<div class="card">
    <div class="card-header">
        Nova cor
    </div>
    <div class="card-body">
        <form method="post" action="{{$endpoint}}">
            @csrf
            <input name="id" value="{{$input_id}}" hidden>
            <label for="exampleDataList" class="form-label">Cor</label>
            <input class="form-control" name="cor" placeholder="Digite a cor" value="{{$input_nome}}">

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
