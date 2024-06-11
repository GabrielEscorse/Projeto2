<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;

class ProdutoController extends Controller
{
    public function index() {

        //$produtos = Produto::all()->toArray();

        $produtos = Produto::select("produto.id",
                                    "produto.nome",
                                    "produto.quantidade",
                                    "produto.preco",
                                    "produto.descricao",
                                    "categoria.nome AS categoria_nome",
                                    "marca.nome AS marca_nome")
                    ->join("categoria", "categoria.id",
                                "=", "produto.id_categoria")
                    ->join("marca", "marca.id",
                                "=", "produto.id_marca")
                    ->get();

        return view("Produto.index",["produtos" => $produtos]);
    }

    public function inserir() {
        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();
        return view("Produto.formulario", ['categorias' => $categorias, 'marcas' => $marcas]);
    }

    public function salvar_novo(Request $request) {
        $produto = new Produto();

        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");

        $produto->descricao = $request->input("descricao");

        $produto->save();

        return redirect('/produto');
    }

    public function excluir($id){
        $produto = Produto::find($id);

        $produto->delete();

        return redirect("/produto");
    }

    public function alterar($id){
        $produto = Produto::find($id);
        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();

        return View("produto.formulario",['produto' => $produto, 'categorias' => $categorias, 'marcas' => $marcas]);
    }

    public function salvar_alterar(Request $request){

        $input_id = $request->input('id');

        $produto = Produto::find($input_id);

        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $produto->descricao = $request->input("descricao");

        $produto->save();

        return redirect('/produto');
        exit;
    }

}
