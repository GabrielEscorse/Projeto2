@extends('TemplateAdmin.index')

@section('contents')
<h1 class="h3 mb-4 text-gray-800">Marca de produtos</h1>
    <div class="card">
        <div class="card-header">
            Lista de marcas
        </div>
        <div class="card-body">

            <a href="marca/novo" class="btn btn-success">Novo</a>

            <table class = "table table-bordered dataTable">
                <thead>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Nome Fantasia</td>
                    <td>Opções</td>
                </thead>

                <tbody>
                    @foreach($marcas as $linha)
                        <tr>
                            <td>{{$linha['id']}}</td>
                            <td>{{$linha['nome']}}</td>
                            <td>{{$linha['nome_fantasia']}}</td>
                            <td><a href="marca/update/{{$linha['id']}}" class = "btn btn-primary" ><li class = "fa fa-edit"></li></a></td>
                            <td><a href="marca/excluir/{{$linha['id']}}" class = "btn btn-danger" ><li class = "fa fa-trash"></li></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
