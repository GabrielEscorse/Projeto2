@extends('TemplateAdmin.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Cadastro de Produtos</h1>

    <div class="card">
        <div class="card-body">
            <a href="/produto/novo" class="btn btn-success" style="margin-bottom: 10px">Novo</a>
            <table class="table table-bordered dataTable">
                <thead>
                <td>Nome</td>
                <td>Categoria</td>
                <td>Marca</td>
                <td>Quantidade</td>
                <td>Preço</td>
                <td>Descrição</td>
                <td>Opções</td>
            </thead>
            <tbody>
                @foreach ($produtos as $dados)
                    <tr>
                        <td>{{ $dados['nome']}}</td>
                        <td>{{ $dados['categoria_nome']}}</td>
                        <td>{{ $dados['marca_nome']}}</td>
                        <td>{{ $dados['quantidade']}}</td>
                        <td>R$ {{ $dados['preco']}}</td>
                        <td>{{ $dados['descricao']}}</td>
                        <td>
                            <a href="/produto/update/{{$dados['id']}}" class = "btn btn-primary" >
                                <li class = "fa fa-edit"></li>
                            </a>
                            <a href="/produto/excluir/{{$dados['id']}}" class = "btn btn-danger" >
                                <li class = "fa fa-trash"></li>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection
