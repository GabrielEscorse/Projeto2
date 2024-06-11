@extends('TemplateAdmin.index')

@section('contents')

@php
    $titulo = "Inclusão de novo produto";
    $btn_titulo = "Cadastrar";
    $endpoint = "/produto/novo";
    $input_nome = "";
    $input_id = "";
    $input_preco = "";
    $input_quantidade = "";
    $input_descricao = "";
    $input_marca_id = "";
    $input_marca_nome = "";
    $input_categoria_nome = "";
    $input_categoria_id = "";

    if(isset($produto)){
        $titulo = "Alteração de produto";
        $btn_titulo = "Alterar";
        $endpoint = "/produto/update";
        $input_nome = $produto['nome'];
        $input_id = $produto['id'];
        $input_preco = $produto['preco'];
        $input_quantidade = $produto['quantidade'];
        $input_descricao = $produto['descricao'];
        $input_marca_id = $produto['id_marca'];
        $input_marca_nome = $produto['marca_nome'];
        $input_categoria_nome = $produto['categoria_nome'];
        $input_categoria_id = $produto['id_categoria'];

        foreach ($marcas as $marca) {
            if($marca['id'] == $input_marca_id){
                $input_marca_nome = $marca['nome'];
            }
        }

        foreach ($categorias as $categoria) {
            if($categoria['id'] == $input_categoria_id){
                $input_categoria_nome = $categoria['nome'];
            }
        }
    }
@endphp

    <h1 class="h3 mb-4 text-gray-800">{{$titulo}}</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{$endpoint}}" method="post" style="display: flex; flex-direction: column">
                @csrf
                <input hidden value="{{$input_id}}" name="id">
                <label>Nome do Produto</label>
                <input type="text" name="nome" value="{{$input_nome}}" style="margin-bottom: 10px" placeholder="Digite o nome do produto">

                <label>Categoria</label>
                <select name="id_categoria" style="margin-bottom: 10px">
                    <option selected value="0">Selecione a categoria</option>
                    @foreach ($categorias as $categoria)
                    @php
                        if($categoria['id'] == $input_categoria_id){
                        echo "<option value=" . $categoria['id'] . " selected>". $categoria['nome'] . "</option>";
                        } else {
                        echo "<option value=" . $categoria['id'] . ">". $categoria['nome'] . "</option>";
                        }
                    @endphp
                    @endforeach
                </select>

                <label>Marca</label>
                <select name="id_marca" style="margin-bottom: 10px">
                    <option selected value="0">Selecione a marca</option>
                    @foreach ($marcas as $marca)
                    @php
                        if($marca['id'] == $input_marca_id){
                        echo "<option value=" . $marca['id'] . " selected>". $marca['nome'] . "</option>";
                        } else {
                        echo "<option value=" . $marca['id'] . ">". $marca['nome'] . "</option>";
                        }
                    @endphp
                    @endforeach
                </select>

                <label>Preço</label>
                <input type="text" name="preco" value="{{$input_preco}}" style="margin-bottom: 10px" placeholder="Digite o preço do produto">

                <label>Quantidade</label>
                <input type="text" name="quantidade" value="{{$input_quantidade}}" style="margin-bottom: 10px" placeholder="Digite a quantidade do produto">

                <section>
                    <div class="container">
                        <div class="card">
                            <textarea id="descricao" name="descricao" cols="30" rows="10">{{$input_descricao}}</textarea>
                        </div>
                    </div>
                </section>

                <div style="width: 100%; display: flex; justify-content: flex-end">
                    <button type="submit" class="btn btn-success" style="width: 10%">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
