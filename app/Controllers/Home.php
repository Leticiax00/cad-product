<?php

namespace App\Controllers;
use App\Models\ProdutoModel;

class Home extends BaseController
{

    public function index(): string
    {
        $produtomodel = new ProdutoModel();
        $produtos = $produtomodel->findAll();
        //dd($produtos); // Debugging line to check the products
         // Uncomment to debug and see the products
        return view('index', ['produtos' => $produtos]);
    }
    public function excluirProduto($id){

        $produtomodel = new ProdutoModel();
        $produtomodel->delete($id);

        return view('produto_excluir');
    }
    public function editar($id){

        $produtomodel = new ProdutoModel();
        $produto = $produtomodel->find($id);
        //dd($produto);
        $data = [
            'produto' => $produto
        ];

        return view('form', $data);
    }
}
